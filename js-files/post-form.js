console.log("POSTFORM.JS LOADED");

document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM READY");

  const form = document.getElementById("postForm");
  if (!form) {
    console.warn("postForm not found");
    return;
  }

  // Handle submit (photo OR video)
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const postType = document.getElementById("postType")?.value;
    const fileInput = document.getElementById("fileInput");
    const file = fileInput?.files[0];

    // Video size validation
    if (postType === "video" && file) {
      const maxMB = 50;
      const sizeMB = file.size / (1024 * 1024);

      if (sizeMB > maxMB) {
        alert(`Your video is too large (${sizeMB.toFixed(1)} MB). Max allowed is ${maxMB} MB.`);
        return;
      }
    }

    submitPostForm(form);
  });

  // Tab switching
  document.querySelectorAll(".post-tabs .tab").forEach(tab => {
    tab.addEventListener("click", () => {
      document.querySelectorAll(".post-tabs .tab")
        .forEach(t => t.classList.remove("active"));

      tab.classList.add("active");

      const type = tab.dataset.type;

      document.getElementById("postType").value = type;
      document.getElementById("postAction").value =
        type === "photo" ? "add_photo" : "add_video";

      const fileInput = document.getElementById("fileInput");
      const fileIcon  = document.getElementById("fileIcon");

      if (type === "photo") {
        fileInput.accept = "image/*";
        fileIcon.className = "far fa-file-image-o";
      } else {
        fileInput.accept = "video/mp4,video/x-m4v,video/*";
        fileIcon.className = "far fa-file-video-o";
      }
    });
  });
});


// AJAX submit stays almost identical
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
        return JSON.parse(raw);
      } catch (err) {
        console.error("❌ INVALID JSON FROM SERVER:");
        console.log(raw);
        alert("❌ Server returned invalid JSON.");
        throw err;
      }
    })
    .then(data => {
      console.log("Parsed JSON:", data);

      if (!data.success) {
        alert(data.error || "Unknown error");
        return;
      }

      const wrapper = data.isVideo
        ? document.querySelector(".profile-video-post-list")
        : document.querySelector(".profile-post-list");

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
