
/* === SocialDestinations Lightbox (images & videos) === */
.sd-lightbox {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,.92);
  display: none;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  overscroll-behavior: contain;
}
.sd-lightbox.is-open { display: flex; }

.sd-lightbox__stage {
  position: relative;
  max-width: 92vw;
  max-height: 88vh;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sd-lightbox__media {
  max-width: 100%;
  max-height: 100%;
  width: auto;
  height: auto;
  border-radius: 8px;
  box-shadow: 0 12px 30px rgba(0,0,0,.5);
  background: #000;
  object-fit: contain;
}

.sd-lightbox__caption {
  position: absolute;
  left: 0; right: 0; bottom: -40px;
  text-align: center;
  color: #eee;
  font: 14px/1.4 MontRegular, system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
  opacity: .85;
}

.sd-lightbox__btn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background: rgba(255,255,255,.08);
  color: #fff;
  font-size: 32px;
  width: 44px;
  height: 44px;
  border-radius: 100%;
  padding: 0px;
  display: grid;
  place-items: center;
  cursor: pointer;
  user-select: none;
  transition: background var(--motion-base, 240ms) var(--ease-smooth, cubic-bezier(.22,.61,.36,1));
}
.sd-lightbox__btn:hover { background: rgba(255,255,255,.18); }
.sd-lightbox__btn:active { background: rgba(255,255,255,.26); }

.sd-lightbox__prev { left: 12px; }
.sd-lightbox__next {right: 12px;}
.sd-lightbox__close {
  top: 16px;
  right: 16px;
  transform: none;
  width: 40px;
  height: 40px;
}

.sd-lightbox__counter {
  position: absolute;
  top: 16px;
  font-size: 14px;
  left: 50%;
  transform: translateX(-50%);
  color: #fff;
  letter-spacing: .08em;
  background: rgba(255,255,255,.06);
  border: 1px solid rgba(255,255,255,.18);
  border-radius: 999px;
  padding: 6px 10px;
}

.sd-lightbox__play {
  position: absolute;
  bottom: 16px; right: 16px;
  color: #fff;
  background: rgba(255,255,255,.08);
  border: 1px solid rgba(255,255,255,.18);
  border-radius: 999px;
  padding: 8px 12px;
  font: 12px/1 MontBold, system-ui, -apple-system, Segoe UI, Roboto, sans-serif;
  cursor: pointer;
}

.sd-noscroll { overflow: hidden; }
