console.log("POSTFORM.JS LOADED");

document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM READY");

  const photoForm = document.getElementById("postForm_photo");
  const videoForm = document.getElementById("postForm_video");

  if (photoForm) {
    console.log("Found photo form");
    photoForm.addEventListener("submit", function (e) {
      e.preventDefault();
      submitPostForm(photoForm);
    });
  }

  if (videoForm) {
    console.log("Found video form");
    videoForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const fileInput = videoForm.querySelector('input[name="Filename"]');
      const file = fileInput?.files[0];

      if (file) {
        const maxMB = 50;
        const sizeMB = file.size / (1024 * 1024);

        if (sizeMB > maxMB) {
          alert(`Your video is too large (${sizeMB.toFixed(1)} MB). Max allowed is ${maxMB} MB.`);
          return;
        }
      }

      submitPostForm(videoForm);
    });
  }

}); // END DOMContentLoaded



function submitPostForm(form) {
  console.log("Submitting AJAX:", form.id);

  const formData = new FormData(form);

  fetch("control.php", {
    method: "POST",
    body: formData
  })
    .then(async res => {
      const raw = await res.text();

      try {
        const json = JSON.parse(raw);
        return json;
      } catch (err) {
        console.error("❌ INVALID JSON FROM SERVER:");
        console.log(raw);
        alert("❌ Server returned invalid JSON.\n\nCheck console for details.");
        throw err;
      }
    })
    .then(data => {
      console.log("Parsed JSON:", data);

      if (!data.success) {
        alert(data.error || "Unknown error");
        return;
      }

      let wrapper;

      if (data.isVideo) {
        wrapper = document.querySelector(".myprofvideoposts");
      } else {
        wrapper = document.querySelector(".myprofposts");
      }

      if (!wrapper) {
        console.error("Wrapper not found");
        return;
      }

      wrapper.insertAdjacentHTML("afterbegin", data.html);

      form.reset();
    })
    .catch(err => {
      console.error("AJAX Error:", err);
      alert("AJAX failed.");
    });
}
