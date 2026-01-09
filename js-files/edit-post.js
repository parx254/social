/* ============================================================
   IMPORTANT GLOBAL FIX:
   Allow postForm_photo and postForm_video to bypass jQuery submit listeners
============================================================ */
$(document).on("submit", function (e) {
  const id = e.target.id;

  // If this is the AJAX photo/video post form → DO NOT block submission
  if (id === "postForm_photo" || id === "postForm_video") {
    return; // Let vanilla JS handle it
  }
});

/* ============================================================
   LIKE BUTTON (jQuery)
============================================================ */
$(document).ready(function () {
  $(".like-form").on("submit", function (e) {
    const id = e.target.id;
    if (id === "postForm_photo" || id === "postForm_video") return;

    e.preventDefault();

    var $form = $(this);
    var $button = $form.find(".like-button");
    var $icon = $button.find("i");
    var $count = $button.find(".like-count");
    var formData = new FormData(this);

    $button.prop("disabled", true);

    $.ajax({
      url: "control.php",
      method: "POST",
      data: formData,
      processData: false,
      contentType: false,
      headers: { "X-Requested-With": "XMLHttpRequest" },
      success: function (response) {
        var data;
        try {
          data = typeof response === "string" ? JSON.parse(response) : response;
        } catch (err) {
          console.error("Invalid JSON from control.php:", response);
          return;
        }

        if (data.status === "liked") {
          $button.addClass("liked");
          $icon.removeClass("far").addClass("fas");
        } else if (data.status === "unliked") {
          $button.removeClass("liked");
          $icon.removeClass("fas").addClass("far");
        }

        if (typeof data.likes !== "undefined" && $count.length) {
          $count.text(data.likes);
        }
      },
      error: function (xhr, status, error) {
        console.error("Like error:", error);
      },
      complete: function () {
        $button.prop("disabled", false);
      }
    });
  });
});

/* ============================================================
   LOAD EDIT FORM (jQuery)
============================================================ */
$(document).on("click", ".edit-post-btn", function (e) {
  e.preventDefault();

  const postID = $(this).data("postid");

  if (!postID) {
    console.error("Missing postID on edit button.");
    return;
  }

  $.ajax({
    url: "control.php",
    method: "POST",
    data: {
      action: "editPost",
      postID: postID,
    },
    success: function (response) {
      if (response && response.edithere) {
        $("#edit-container").html(response.edithere).fadeIn(200);
      } else {
        console.warn("No editable content returned:", response);
        $("#edit-container").html("<p>Could not load edit form.</p>");
      }
    },
    error: function (xhr, status, error) {
      console.error("Error loading edit form:", error);
      console.log(xhr.responseText);
      $("#edit-container").html("<p>There was an error loading the form.</p>");
    },
  });
});

/* ============================================================
   UPDATE POST (jQuery)
============================================================ */
$(document).on("submit", ".edit-post-form", function (e) {
  const id = e.target.id;
  if (id === "postForm_photo" || id === "postForm_video") return;

  e.preventDefault();

  const $form = $(this);
  const formData = new FormData(this);

  if (!formData.has("action")) {
    formData.append("action", "updatePost");
  }

  $.ajax({
    url: "control.php",
    method: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      let data;
      try {
        data = typeof response === "string" ? JSON.parse(response) : response;
      } catch (err) {
        console.error("Invalid JSON from control.php:", response);
        $form.append("<div class='error-message'>Invalid server response.</div>");
        return;
      }

      if (data.status === "success") {
        $form.closest(".editprofile-posts").html(
          `<div class='success-message'>✅ ${data.message}</div>`
        );
      } else {
        $form.append(
          `<div class='error-message'>${data.message || "There was a problem saving the post."}</div>`
        );
      }
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", error, xhr.responseText);
      $form.append("<div class='error-message'>There was a problem saving the post.</div>");
    },
  });
});

/* Cancel Edit */
$(document).on("click", ".cancel-edit", function (e) {
  e.preventDefault();
  $(this).closest(".editprofile-posts").fadeOut(200, function () {
    $(this).remove();
  });
});

/* ============================================================
   DELETE POST (jQuery)
============================================================ */
$(document).on("click", ".delete", function () {
  let postID = $(this).data("postid");
  if (!confirm("Delete this post?")) return;

  $.ajax({
    url: "control.php",
    method: "POST",
    data: {
      action: "deletePost",
      postID: postID
    },
    success: function (response) {
  let data;
  try {
    data = typeof response === "string" ? JSON.parse(response) : response;
  } catch (e) {
    console.warn("Delete response not JSON, assuming success.");
  }

  $("#post_" + postID).fadeOut(200, function () {
    $(this).remove();
  });
}
,
    error: function (xhr, status, error) {
      alert("Error deleting post: " + error);
    }
  });
});


