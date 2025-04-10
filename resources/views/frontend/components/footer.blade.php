<footer class="py-3 mt-auto" style="background-color: #212529">
    <div class="container text-center">
        <small class="text-white-50">© {{ date('Y') }} Mei Blooms. All rights reserved.</small>
    </div>
</footer>
<style>
    /* Footer Styling */
footer {
  background-color: #212529;
  position: fixed; /* Fix the footer at the bottom */
  bottom: 0; /* Position it at the bottom of the page */
  left: 0;
  width: 100%; /* Make it span the full width of the page */
  z-index: 1000; /* Ensure it stays on top of other elements */
  padding: 2px 0; /* Adjust padding to fit your design */
}

footer .container {
  text-align: center;
}

footer small {
  color: #ffffff; /* Light text color */
}

/* To ensure the content doesn't overlap with the footer */
body {
  padding-bottom: 50px; /* Adjust this to the height of your footer */
}

</style>
