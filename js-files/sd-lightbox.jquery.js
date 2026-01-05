
/*! SocialDestinations Lightbox v3 (jQuery) */
$(function () {
  console.log("SD lightbox v3 (jQuery) loaded");

  // Clickable media
  const TARGETS = '.feedimg img, .postcontenttop img, .postcontenttop video, .postcontent img, .postcontent video';

  // Global gallery sources
  const GALLERY_ROOTS = '.feedposts, .videofeedposts, .myprofposts, .myprofvideoposts';

  // Overlay template
  const $overlay = $(`
    <div class="sd-lightbox">
      <div class="sd-lightbox__stage">
        <button class="sd-lightbox__btn sd-lightbox__close" aria-label="Close">✕</button>
        <button class="sd-lightbox__btn sd-lightbox__prev" aria-label="Previous">‹</button>
        <button class="sd-lightbox__btn sd-lightbox__next" aria-label="Next">›</button>
        <div class="sd-lightbox__counter" aria-live="polite"></div>
        <button class="sd-lightbox__play" aria-pressed="false">Play</button>
      </div>
    </div>
  `).appendTo('body');

  let items = [];
  let index = 0;
  let autoplay = false, timer = null;

function buildGallery() {
  items = [];

  $(TARGETS).each(function () {
    const $el = $(this);
    const isVideo = $el.is('video');

    const src = isVideo
      ? ($el[0].currentSrc || $el.find('source').attr('src') || $el.attr('src'))
      : ($el[0].currentSrc || $el.attr('src'));

    if (!src) return;

    const caption =
      $el.attr('alt') ||
      $el.attr('title') ||
      $el.closest('[data-caption]').data('caption') ||
      '';

    items.push({
      type: isVideo ? 'video' : 'image',
      src,
      caption
    });
  });
}


  function render() {
      
        if (!items.length || !items[index]) {
    console.warn('Lightbox render aborted', { index, items });
    return;
  }
  
    const $stage = $overlay.find('.sd-lightbox__stage');
    $stage.find('.sd-lightbox__media, .sd-lightbox__caption').remove();

    const item = items[index];
    let $media;
    if (item.type === 'video') {
      $media = $(`<video class="sd-lightbox__media" autoplay muted playsinline controls></video>`)
        .attr('src', item.src);
    } else {
      $media = $(`<img class="sd-lightbox__media" alt="">`)
        .attr('src', item.src).attr('alt', item.caption);
    }
    $stage.append($media);

    if (item.caption) {
      $stage.append($('<div class="sd-lightbox__caption">').text(item.caption));
    }

    $overlay.find('.sd-lightbox__counter').text(`${index + 1} / ${items.length}`);

    
  }



  function openAt(i) {
    buildGallery();
    index = i;
    render();
    $overlay.addClass('is-open');
    $('html, body').addClass('sd-noscroll');
  }

  function close() {
    $overlay.removeClass('is-open');
    $('html, body').removeClass('sd-noscroll');
    stopAutoplay();
  }

  function prev() { index = (index - 1 + items.length) % items.length; render(); }
  function next() { index = (index + 1) % items.length; render(); }

  function startAutoplay() {
    autoplay = true;
    $overlay.find('.sd-lightbox__play').attr('aria-pressed', 'true').text('Pause');
    timer = setInterval(next, 3500);
  }
  function stopAutoplay() {
    autoplay = false;
    $overlay.find('.sd-lightbox__play').attr('aria-pressed', 'false').text('Play');
    if (timer) { clearInterval(timer); timer = null; }
  }
  function toggleAutoplay() { autoplay ? stopAutoplay() : startAutoplay(); }

  // Event delegation
  $(document).on('click', TARGETS, function (e) {
    e.preventDefault();
    const src = this.currentSrc || this.src || $(this).attr('src');
    buildGallery();
    const i = items.findIndex(it => it.src === src);
    openAt(i >= 0 ? i : 0);
  });

  $overlay.on('click', '.sd-lightbox__close', close)
          .on('click', '.sd-lightbox__prev', prev)
          .on('click', '.sd-lightbox__next', next)
          .on('click', '.sd-lightbox__play', toggleAutoplay);

  $(document).on('keydown', function (e) {
    if (!$overlay.hasClass('is-open')) return;
    if (e.key === 'Escape') close();
    else if (e.key === 'ArrowLeft') prev();
    else if (e.key === 'ArrowRight') next();
    else if (e.key === ' ') { e.preventDefault(); toggleAutoplay(); }
  });
});
