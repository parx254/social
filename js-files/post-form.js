console.log("POSTFORM.JS LOADED");

document.addEventListener("DOMContentLoaded", () => {
  console.log("DOM READY");

  const form = document.getElementById("postForm");
  if (!form) {
    console.warn("postForm not found");
    return;
  }

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const postType = document.getElementById("postType")?.value || "photo";
    const fileInput = document.getElementById("fileInput");
    const file = fileInput?.files?.[0];

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
  document.querySelectorAll(".post-tabs .tab").forEach((tab) => {
    tab.addEventListener("click", () => {
      document.querySelectorAll(".post-tabs .tab").forEach((t) => t.classList.remove("active"));
      tab.classList.add("active");

      const type = tab.dataset.type === "video" ? "video" : "photo";

      const postTypeEl = document.getElementById("postType");
      if (postTypeEl) postTypeEl.value = type;

      // IMPORTANT: make sure you have a hidden input named="action"
      // Example: <input type="hidden" id="action" name="action" value="add_photo">
      const actionEl = document.getElementById("action") || document.getElementById("postAction");
      if (actionEl) actionEl.value = type === "photo" ? "add_photo" : "add_video";

      const fileInput = document.getElementById("fileInput");
      const fileIcon = document.getElementById("fileIcon");

      if (fileInput) {
        fileInput.accept = type === "photo"
          ? "image/*"
          : "video/mp4,video/x-m4v,video/*";
      }

      if (fileIcon) {
        fileIcon.className = type === "photo"
          ? "far fa-file-image-o"
          : "far fa-file-video-o";
      }
    });
  });
});

function submitPostForm(form) {
  console.log("Submitting AJAX:", form.id);

  const fd = new FormData(form);

  // Ensure action exists for the router
  if (!fd.get("action")) {
    const postType = fd.get("postType") || "photo";
    fd.set("action", postType === "video" ? "add_video" : "add_photo");
  }

  fetch("control.php", {
    method: "POST",
    body: fd,
    headers: {
      "X-Requested-With": "XMLHttpRequest"
    }
  })
    .then(async (res) => {
      const raw = await res.text();

      let data;
      try {
        data = JSON.parse(raw);
      } catch (err) {
        console.error("❌ INVALID JSON FROM SERVER:");
        console.log(raw);
        alert("❌ Server returned invalid JSON (see console).");
        throw err;
      }

      if (!res.ok) {
        console.error("Server HTTP error:", res.status, data);
        throw new Error(data?.error || "Server error");
      }

      return data;
    })
    .then((data) => {
      console.log("Parsed JSON:", data);

      if (!data.success) {
        alert(data.error || data.message || "Unknown error");
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
    .catch((err) => {
      console.error("AJAX Error:", err);
      alert("AJAX failed.");
    });
}
