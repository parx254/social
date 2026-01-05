function openSearch() {
  $("#myOverlay").css("display", "block");
  $("#toggle").css("display", "none");
  $( "body" ).addClass( "noscroll" );
}

function closeSearch() {
  $("#myOverlay").css("display", "none");
  $("#toggle").css("display", "block");
  $( "body" ).removeClass( "noscroll" );
}
// jQuery equivalent for enabling register button
function enableRegisterButton() {
    $('#registerBtn').prop('disabled', false).removeClass('hidden');
}

// jQuery equivalent for disabling register button
function disableRegisterButton() {
    $('#registerBtn').prop('disabled', true).addClass('hidden');
}

// jQuery equivalent for handling Recaptcha callback
function recaptchaCallback() {
    var response = grecaptcha.getResponse();
    if (response.length !== 0) {
        enableRegisterButton();
    } else {
        disableRegisterButton();
    }
}

// jQuery document ready function for initial setup
$(document).ready(function() {
    // Disable register button initially
    disableRegisterButton();

    // Attach event listener to reCAPTCHA checkbox change
    $('.g-recaptcha').on('change', function() {
        recaptchaCallback();
    });
});
        function copyRightDate() {
            var currentYear = new Date().getFullYear();
            $("#currentYear").text(currentYear);
        }

$(function () {
  $(".home-scroll-down").click(function () {
    $("html, body").animate({
      scrollTop: $("div.container").offset().top
    }, "slow");
    return false;
  });
});
$(function () {
$("#toggle").click(function () {
    $(this).toggleClass("on"),
    $("body").toggleClass("noscroll"),
    $("#resize").toggleClass("active");
    $("html, body").animate({scrollTop: 0}, 500);
    return false;
  });
});
  $.getJSON("https://api.openweathermap.org/data/2.5/weather?q=" + city + "&units=imperial&appid=77a3fcb056acf542593851a808e77677", function (t) {
    var e = "https://openweathermap.org/img/w/" + t.weather[0].icon + ".png",
      n = Math.floor(t.main.temp),
      o = t.weather[0].main;
    $(".icon").attr("src", e), $(".weather").append(o), $(".temp").append(n);
  }),
  $(function () {
    $(".scroll-down").click(function () {
      return (
        $("html, body").animate({
            scrollTop: $("div.post-feed").offset().top,
          },
          "slow"
        ), !1
      );
    });
  }),
  $(function () {
    $("#searchbox1").on("input", function () {
      var e = $(this).val();
      $(this).val(e.replace(/ /g, "_"));
    });
  }),
  $(function () {
    $("#searchbox2").on("input", function () {
      var e = $(this).val();
      $(this).val(e.replace(/ /g, "_"));
    });
  }),
  $(function () {
    $("#searchbox3").on("input", function () {
      var e = $(this).val();
      $(this).val(e.replace(/ /g, "_"));
    });
  }),

  $(document).ready(function () {
    $("#searchbox1").keyup(function () {
        var e = $("#searchbox1").val();
        e = "%" + e + "%";
        if (e.length == 2) {
          $('#response1').empty(); //to empty the result list
          return;
        } else {
          $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
              searchppl: 1,
              q: e,
            },
            success: function (e) {
              $("#response1").html(e);
              $('#response1 li:gt(6)').remove();
            },
            dataType: "text",
          });
        }
      }),
      $(document).on("li", function () {
        var e = $(this).text();
        $("#searchbox1").val(e), $("#response1").html("");
      });
  }),
  $(document).ready(function () {
    $("#searchbox2").keyup(function () {
        var e = $("#searchbox2").val();
        e = "%" + e + "%";
        if (e.length == 2) {
          $('#response2').empty(); //to empty the result list
          return;
        } else {
          $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
              searchppl: 1,
              q: e,
            },
            success: function (e) {
              $("#response2").html(e);
              $('#response2 li:gt(6)').remove();
            },
            dataType: "text",
          });
        }
      }),
      $(document).on("li", function () {
        var e = $(this).text();
        $("#searchbox2").val(e), $("#response2").html("");
      });
  }),
  $(document).ready(function () {
    $("#searchbox3").keyup(function () {
        var e = $("#searchbox3").val();
        e = "%" + e + "%";
        if (e.length == 2) {
          $('#response3').empty(); //to empty the result list
          return;
        } else {
          $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
              searchplace: 1,
              q: e,
            },
            success: function (e) {
              $("#response3").html(e);
              $('#response3 li:gt(6)').remove();
            },
            dataType: "text",
          });
        }
      }),
      $(document).on("li", function () {
        var e = $(this).text();
        $("#searchbox3").val(e), $("#response3").html("");
      });
  }),
  $(document).ready(function () {
    $("#searchbox4").keyup(function () {
        var e = $("#searchbox4").val();
        e = "%" + e + "%";
        if (e.length == 2) {
          $('#response4').empty(); //to empty the result list
          return;
        } else {
          $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
              searchplace: 1,
              q: e,
            },
            success: function (e) {
              $("#response4").html(e);
              $('#response4 li:gt(6)').remove();
            },
            dataType: "text",
          });
        }
      }),
      $(document).on("li", function () {
        var e = $(this).text();
        $("#searchbox4").val(), $("#response4").html("");
      });
  }),
  $(document).ready(function () {
    $("#searchbox5").keyup(function () {
        var e = $("#searchbox5").val();
        e = "%" + e + "%";
        if (e.length == 2) {
          $('#response5').empty(); //to empty the result list
          return;
        } else {
          $.ajax({
            url: "functions.php",
            method: "POST",
            data: {
              searchplace: 1,
              q: e,
            },
            success: function (e) {
              $("#response5").html(e);
              $('#response5 li:gt(6)').remove();
            },
            dataType: "text",
          });
        }
      }),
      $(document).on("li", function () {
        var e = $(this).text();
        $("#searchbox5").val(e), $("#response5").html("");
      });
  }),
  $(document).ready(function () {
    $("#edit-profile-media").click(function () {
      $("#changeprofile").show(), $("#edit-profile-media").hide();
    });
  }),
  $(function () {
    $(".scroll-down").click(function () {
      return (
        $("html, body").animate({
            scrollTop: $("div.post-feed").offset().top,
          },
          "slow"
        ), !1
      );
    });
  });
$(document).ready(function () {
  $(".topslide").bind("contextmenu", function () {
    return false;
  });
});



document.addEventListener("DOMContentLoaded", () => {
  const v = document.getElementById("bgVideo");

  // Ensure muted for autoplay
  v.muted = true;

  // Try autoplay immediately
  const tryPlay = () => {
    const p = v.play();
    if (p !== undefined) {
      p.catch(() => {
        // Safari/iOS requires interaction
        const resume = () => {
          v.play();
          document.removeEventListener("touchstart", resume);
          document.removeEventListener("click", resume);
        };
        document.addEventListener("touchstart", resume);
        document.addEventListener("click", resume);
      });
    }
  };

  tryPlay();

  // Fade in when video loads
  const fadeIn = () => v.classList.add("fade-in");

  v.addEventListener("loadeddata", fadeIn);

  // Safari often only fires metadata
  v.addEventListener("loadedmetadata", fadeIn);

  // Guarantee fade-in even if Safari loads nothing
  setTimeout(() => {
    if (!v.classList.contains("fade-in")) fadeIn();
  }, 1200);
});



function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#blah").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

$(function () {
  $(".explore-scroll-down").click(function () {
    $("html, body").animate({
      scrollTop: $("div.grid-tab-wrapper").offset().top
    }, "slow");
    return false;
  });
});

function forceLower(strInput) {
  strInput.value = strInput.value.toLowerCase();
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $("#blah").attr("src", e.target.result);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
$("#imgInp").change(function () {
  readURL(this);
});
var loadFile = function (event) {
  var output = document.getElementById("output");
  output.src = URL.createObjectURL(event.target.files[0]);
};

var liText = '',
  liList = $('#myid li'),
  listForRemove = [];

$(liList).each(function () {

  var text = $(this).text();

  if (liText.indexOf('|' + text + '|') == -1)
    liText += '|' + text + '|';
  else
    listForRemove.push($(this));

});

$(listForRemove).each(function () {
  $(this).remove();
});
$('p:empty').remove();




window.FontAwesomeKitConfig = {
  asyncLoading: {
    enabled: false
  },
  autoA11y: {
    enabled: true
  },
  baseUrl: "https://kit-pro.fontawesome.com",
  detectConflictsUntil: null,
  license: "pro",
  method: "css",
  minify: {
    enabled: true
  },
  v4FontFaceShim: {
    enabled: true
  },
  v4shim: {
    enabled: true
  },
  version: "latest",
};
!(function () {
  function r(e) {
    var t,
      n = [],
      i = document,
      o = i.documentElement.doScroll,
      r = "DOMContentLoaded",
      a = (o ? /^loaded|^c/ : /^loaded|^i|^c/).test(i.readyState);
    a ||
      i.addEventListener(
        r,
        (t = function () {
          for (i.removeEventListener(r, t), a = 1;
            (t = n.shift());) t();
        })
      ),
      a ? setTimeout(e, 0) : n.push(e);
  }!(function () {
    if (!(void 0 === window.Element || "classList" in document.documentElement)) {
      var e,
        t,
        n,
        i = Array.prototype,
        o = i.push,
        r = i.splice,
        a = i.join;
      (d.prototype = {
        add: function (e) {
          this.contains(e) || (o.call(this, e), (this.el.className = this.toString()));
        },
        contains: function (e) {
          return -1 != this.el.className.indexOf(e);
        },
        item: function (e) {
          return this[e] || null;
        },
        remove: function (e) {
          if (this.contains(e)) {
            for (var t = 0; t < this.length && this[t] != e; t++);
            r.call(this, t, 1), (this.el.className = this.toString());
          }
        },
        toString: function () {
          return a.call(this, " ");
        },
        toggle: function (e) {
          return this.contains(e) ? this.remove(e) : this.add(e), this.contains(e);
        },
      }),
      (window.DOMTokenList = d),
      (e = Element.prototype),
      (t = "classList"),
      (n = function () {
        return new d(this);
      }),
      Object.defineProperty ? Object.defineProperty(e, t, {
        get: n
      }) : e.__defineGetter__(t, n);
    }

    function d(e) {
      for (var t = (this.el = e).className.replace(/^\s+|\s+$/g, "").split(/\s+/), n = 0; n < t.length; n++) o.call(this, t[n]);
    }
  })();

  function a(e) {
    var t, n, i, o;
    (prefixesArray = e || ["fa"]),
    (prefixesSelectorString = "." + Array.prototype.join.call(e, ",.")),
    (t = document.querySelectorAll(prefixesSelectorString)),
    Array.prototype.forEach.call(t, function (e) {
      (n = e.getAttribute("title")),
      e.setAttribute("aria-hidden", "true"),
        (i = !e.nextElementSibling || !e.nextElementSibling.classList.contains("sr-only")),
        n && i && (((o = document.createElement("span")).innerHTML = n), o.classList.add("sr-only"), e.parentNode.insertBefore(o, e.nextSibling));
    });
  }
  var d = function (e, t) {
      var n = document.createElement("link");
      (n.href = e),
      (n.media = "all"),
      (n.rel = "stylesheet"),
      t && t.detectingConflicts && t.detectionIgnoreAttr && n.setAttributeNode(document.createAttribute(t.detectionIgnoreAttr)),
        document.getElementsByTagName("head")[0].appendChild(n);
    },
    c = function (e, t) {
      !(function (e, t) {
        var n,
          i = (t && t.before) || void 0,
          o = (t && t.media) || void 0,
          r = window.document,
          a = r.createElement("link");
        if ((t && t.detectingConflicts && t.detectionIgnoreAttr && a.setAttributeNode(document.createAttribute(t.detectionIgnoreAttr)), i)) n = i;
        else {
          var d = (r.body || r.getElementsByTagName("head")[0]).childNodes;
          n = d[d.length - 1];
        }
        var c = r.styleSheets;
        (a.rel = "stylesheet"),
        (a.href = e),
        (a.media = "only x"),
        (function e(t) {
          if (r.body) return t();
          setTimeout(function () {
            e(t);
          });
        })(function () {
          n.parentNode.insertBefore(a, i ? n : n.nextSibling);
        });
        var s = function (e) {
          for (var t = a.href, n = c.length; n--;)
            if (c[n].href === t) return e();
          setTimeout(function () {
            s(e);
          });
        };

        function l() {
          a.addEventListener && a.removeEventListener("load", l), (a.media = o || "all");
        }
        a.addEventListener && a.addEventListener("load", l), (a.onloadcssdefined = s)(l);
      })(e, t);
    },
    e = function (e, t, n) {
      var i = t && void 0 !== t.autoFetchSvg ? t.autoFetchSvg : void 0,
        o = t && void 0 !== t.async ? t.async : void 0,
        r = t && void 0 !== t.autoA11y ? t.autoA11y : void 0,
        a = document.createElement("script"),
        d = document.scripts[0];
      (a.src = e),
      void 0 !== r && a.setAttribute("data-auto-a11y", r ? "true" : "false"),
        i && (a.setAttributeNode(document.createAttribute("data-auto-fetch-svg")), a.setAttribute("data-fetch-svg-from", t.fetchSvgFrom)),
        o && a.setAttributeNode(document.createAttribute("defer")),
        n && n.detectingConflicts && n.detectionIgnoreAttr && a.setAttributeNode(document.createAttribute(n.detectionIgnoreAttr)),
        d.parentNode.appendChild(a);
    };

  function s(e, t) {
    var n = (t && t.addOn) || "",
      i = (t && t.baseFilename) || e.license + n,
      o = t && t.minify ? ".min" : "",
      r = (t && t.fileSuffix) || e.method,
      a = (t && t.subdir) || e.method;
    return e.baseUrl + "/releases/" + ("latest" === e.version ? "latest" : "v".concat(e.version)) + "/" + a + "/" + i + o + "." + r;
  }
  var t, n, i, o, l;
  try {
    if (window.FontAwesomeKitConfig) {
      var u,
        f = window.FontAwesomeKitConfig,
        m = {
          detectingConflicts: f.detectConflictsUntil && new Date() <= new Date(f.detectConflictsUntil),
          detectionIgnoreAttr: "data-fa-detection-ignore",
          detectionTimeoutAttr: "data-fa-detection-timeout",
          detectionTimeout: null,
        };
      "js" === f.method &&
        ((o = m),
          (l = {
            async: (i = f).asyncLoading.enabled,
            autoA11y: i.autoA11y.enabled
          }),
          "pro" === i.license && ((l.autoFetchSvg = !0), (l.fetchSvgFrom = i.baseUrl + "/releases/" + ("latest" === i.version ? "latest" : "v".concat(i.version)) + "/svgs")),
          i.v4shim.enabled && e(s(i, {
            addOn: "-v4-shims",
            minify: i.minify.enabled
          })),
          e(s(i, {
            minify: i.minify.enabled
          }), l, o)),
        "css" === f.method &&
        (function (e, t) {
          var n,
            i = a.bind(a, ["fa", "fab", "fas", "far", "fal", "fad"]);
          e.autoA11y.enabled && (r(i), (n = i), "undefined" != typeof MutationObserver && new MutationObserver(n).observe(document, {
              childList: !0,
              subtree: !0
            })),
            e.v4shim.enabled && (e.license, e.asyncLoading.enabled ? c(s(e, {
              addOn: "-v4-shims",
              minify: e.minify.enabled
            }), t) : d(s(e, {
              addOn: "-v4-shims",
              minify: e.minify.enabled
            }), t));
          e.v4FontFaceShim.enabled && (e.asyncLoading.enabled ? c(s(e, {
            addOn: "-v4-font-face",
            minify: e.minify.enabled
          }), t) : d(s(e, {
            addOn: "-v4-font-face",
            minify: e.minify.enabled
          }), t));
          var o = s(e, {
            minify: e.minify.enabled
          });
          e.asyncLoading.enabled ? c(o, t) : d(o, t);
        })(f, m),
        m.detectingConflicts &&
        ((u = document.currentScript.getAttribute(m.detectionTimeoutAttr)) && (m.detectionTimeout = u),
          document.currentScript.setAttributeNode(document.createAttribute(m.detectionIgnoreAttr)),
          (t = f),
          (n = m),
          r(function () {
            var e = document.createElement("script");
            n && n.detectionIgnoreAttr && e.setAttributeNode(document.createAttribute(n.detectionIgnoreAttr)),
              n && n.detectionTimeoutAttr && n.detectionTimeout && e.setAttribute(n.detectionTimeoutAttr, n.detectionTimeout),
              (e.src = s(t, {
                baseFilename: "conflict-detection",
                fileSuffix: "js",
                subdir: "js",
                minify: t.minify.enabled
              })),
              (e.async = !0),
              document.body.appendChild(e);
          }));
    }
  } catch (e) {}
})();






document.addEventListener('DOMContentLoaded', () => {
  const searchItem  = document.querySelector('.search-item');
  const searchInput = document.getElementById('searchbox1');

  if (!searchItem || !searchInput) return;

  // Toggle search on icon click
  searchItem.addEventListener('click', e => {
    // Prevent closing when clicking inside input
    if (e.target === searchInput) return;

    searchItem.classList.toggle('active');

    if (searchItem.classList.contains('active')) {
      searchInput.focus();
    } else {
      searchInput.blur();
      searchInput.value = '';
    }
  });

  // Close on ESC
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape' && searchItem.classList.contains('active')) {
      searchItem.classList.remove('active');
      searchInput.blur();
      searchInput.value = '';
    }
  });

  // Close when clicking outside
  document.addEventListener('click', e => {
    if (!searchItem.contains(e.target)) {
      searchItem.classList.remove('active');
    }
  });
});



  (function () {
    const cover = document.querySelector('.profile-cover');
    if (!cover) return;

    window.addEventListener('scroll', () => {
      const scrollY = window.scrollY;
      const maxFade = 200; // px
      const opacity = Math.max(0.7, 1 - scrollY / maxFade);

      cover.style.setProperty(
        '--cover-overlay-opacity',
        opacity.toFixed(2)
      );
    }, { passive: true });
  })();
  
  
  
  window.addEventListener('scroll', () => {
  const shift = Math.min(window.scrollY * 0.08, 20);
  document
    .querySelector('.profile-cover')
    ?.style.setProperty('--cover-shift', `${shift}px`);
}, { passive: true });
