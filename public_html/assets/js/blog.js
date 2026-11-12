/**
 * WayloShare Blog Filter JavaScript (blog.js)
 * Instant client-side topic filtering without page reload.
 */
(function () {
  'use strict';

  const chips = document.querySelectorAll('#blog-chips .chip');
  const postCards = document.querySelectorAll('#posts-grid .post-card');
  const emptyMsg = document.getElementById('empty-posts');

  function filterCategory(cat) {
    let visibleCount = 0;

    chips.forEach(function (c) {
      const match = (c.getAttribute('data-cat') === cat);
      c.setAttribute('aria-pressed', match ? 'true' : 'false');
    });

    postCards.forEach(function (card) {
      const cardCat = card.getAttribute('data-category');
      if (cat === 'All' || cardCat === cat) {
        card.style.display = '';
        visibleCount++;
      } else {
        card.style.display = 'none';
      }
    });

    if (emptyMsg) {
      emptyMsg.style.display = (visibleCount === 0) ? 'block' : 'none';
    }
  }

  chips.forEach(function (chip) {
    chip.addEventListener('click', function (e) {
      e.preventDefault();
      const cat = chip.getAttribute('data-cat');
      filterCategory(cat);

      // Update URL query string without reloading
      const url = new URL(window.location.href);
      if (cat === 'All') {
        url.searchParams.delete('cat');
      } else {
        url.searchParams.set('cat', cat);
      }
      history.pushState({ cat: cat }, '', url.toString());
    });
  });

  window.addEventListener('popstate', function (e) {
    const url = new URL(window.location.href);
    const cat = url.searchParams.get('cat') || 'All';
    filterCategory(cat);
  });
})();

