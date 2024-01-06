<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
function showLogoutConfirmation() {
  Swal.fire({
    title: 'Are you sure?',
    text: 'You are about to log out. Do you want to proceed?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, log out'
  }).then((result) => {
    if (result.isConfirmed) {
      // If the user confirms, perform the logout action
      performLogout();
    }
  });
}

function performLogout() {
  Swal.fire({
    title: 'Success!',
    icon: 'success',
    showConfirmButton: false,
    timer: 3000,
  }).then(() => {
    // After showing the success message, submit the form and navigate to logout.php
    location.href = 'logout.php';
  });
}
</script>