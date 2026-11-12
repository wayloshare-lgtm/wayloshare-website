/**
 * WayloShare Pink Ride JavaScript (pink-ride.js)
 * Toggles "I want a ride" vs "I'm driving" mode.
 */
(function () {
  'use strict';

  const roleRide = document.getElementById('role-ride');
  const roleDrive = document.getElementById('role-drive');
  const submitBtn = document.getElementById('pink-submit-btn');

  function setRole(role) {
    if (role === 'drive') {
      roleDrive.setAttribute('aria-selected', 'true');
      roleDrive.style.background = '#ffffff';
      roleDrive.style.color = '#C72561';
      roleDrive.style.fontWeight = '700';

      roleRide.setAttribute('aria-selected', 'false');
      roleRide.style.background = 'transparent';
      roleRide.style.color = '#ffffff';
      roleRide.style.fontWeight = '600';

      if (submitBtn) {
        submitBtn.textContent = 'Post a Pink ride';
      }
    } else {
      roleRide.setAttribute('aria-selected', 'true');
      roleRide.style.background = '#ffffff';
      roleRide.style.color = '#C72561';
      roleRide.style.fontWeight = '700';

      roleDrive.setAttribute('aria-selected', 'false');
      roleDrive.style.background = 'transparent';
      roleDrive.style.color = '#ffffff';
      roleDrive.style.fontWeight = '600';

      if (submitBtn) {
        submitBtn.textContent = 'Find Pink rides';
      }
    }
  }

  if (roleRide && roleDrive) {
    roleRide.addEventListener('click', function () { setRole('ride'); });
    roleDrive.addEventListener('click', function () { setRole('drive'); });
  }
})();

