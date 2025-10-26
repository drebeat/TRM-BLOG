<?php
include 'partials/header.php'
?>


<section class="form__section">
  <div class="container form__section-container">
    <h2 style="padding-top: 1.5rem;">SEND YOUR PRAYER REQUEST</h2>
    <form action="./process/config0.php" method="POST">
      <input type="text" name="fullname" id="emailInput" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <textarea rows="10" name="message" placeholder="Message"></textarea>

      <button type="submit" name="submit" class="btn" id="signupButton">SEND</button>
      <small>We are here to serve</small>
    </form>

  </div>
</section>

<script>
  // Add an event listener to the button
  document.getElementById("signupButton").addEventListener("click", function(e) {
    // Prevent the default form submission behavior
    e.preventDefault();

    // Get the email input value
    var email = document.getElementById("emailInput").value;

    // Perform any necessary validation here

    // Show SweetAlert notification
    Swal.fire({
      title: "Request Notification",
      text: "We are pleased to receive your request, Someone will reach out to you!",
      icon: "success",
      confirmButtonText: "OK",
      customClass: {
        container: 'small-alert-container',
        popup: 'small-alert-popup',
        title: 'small-alert-title',
        content: 'small-alert-content',
        confirmButton: 'small-alert-confirm-button'
      }
    });
  });
</script>


<?php
include 'partials/footer.php'
?>