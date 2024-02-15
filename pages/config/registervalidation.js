document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");

    form.addEventListener("submit", function(event) {
      // Validate Username
      const username = document.getElementById("name").value;
      if (username.trim() === "") {
        alert("Username cannot be empty");
        event.preventDefault(); // Prevent form submission
        return;
      }

      // Validate Email
      const email = document.getElementById("email").value;
      if (!isValidEmail(email)) {
        alert("Invalid email address");
        event.preventDefault(); // Prevent form submission
        return;
      }

      // Validate Password
      const password = document.getElementById("pass").value;
      if (password.length < 6) {
        alert("Password must be at least 6 characters");
        event.preventDefault(); // Prevent form submission
        return;
      }

      // Validate Elementary Graduation Year
      const elemYear = document.getElementById("elemyear").value;
      if (elemYear > new Date().getFullYear()) {
        alert("Elementary graduation year cannot be in the future");
        event.preventDefault(); // Prevent form submission
        return;
      }

      // Validate Junior High School Graduation Year
      const jhsYear = document.getElementById("jhsyear").value;
      if (jhsYear > new Date().getFullYear()) {
        alert("Junior High School graduation year cannot be in the future");
        event.preventDefault(); // Prevent form submission
        return;
      }

      // Validate Senior High School Graduation Year
      const shsYear = document.getElementById("shsyear").value;
      if (shsYear > new Date().getFullYear()) {
        alert("Senior High School graduation year cannot be in the future");
        event.preventDefault(); // Prevent form submission
        return;
      }

      const firstName = document.getElementById("fname").value;
      if (firstName.trim() === "") {
        alert("First Name cannot be empty");
        event.preventDefault();
        return;
      }

      // Validate Middle Name
      const middleName = document.getElementById("mname").value;
      if (middleName.trim() === "") {
        alert("Middle Name cannot be empty");
        event.preventDefault();
        return;
      }

      // Validate Last Name
      const lastName = document.getElementById("lname").value;
      if (lastName.trim() === "") {
        alert("Last Name cannot be empty");
        event.preventDefault();
        return;
      }

      // Validate Gender
      const gender = document.getElementById("genderSelect").value;
      if (gender === "") {
        alert("Please select a Gender");
        event.preventDefault();
        return;
      }

      // Validate Course
      const course = document.getElementById("courseSelect").value;
      if (course === "") {
        alert("Please select a Course");
        event.preventDefault();
        return;
      }

      // Validate Year
      const year = document.getElementById("yearSelect").value;
      if (year === "") {
        alert("Please select a Year");
        event.preventDefault();
        return;
      }

      // Validate Date of Birth
      const birthday = new Date(document.getElementById("datepicker").value);
      const currentDate = new Date();
      if (birthday >= currentDate) {
        alert("Invalid Date of Birth");
        event.preventDefault();
        return;
      }

      // Validate Home Address
      const address = document.getElementById("address").value;
      if (address.trim() === "") {
        alert("Home Address cannot be empty");
        event.preventDefault();
        return;
      }

      // Validate Phone Number
      const phoneNumber = document.getElementById("number").value;
      if (!isValidPhoneNumber(phoneNumber)) {
        alert("Invalid Phone Number");
        event.preventDefault();
        return;
      }

      // Validate Guardian Name
      const guardianName = document.getElementById("guardianname").value;
      if (guardianName.trim() === "") {
        alert("Guardian Name cannot be empty");
        event.preventDefault();
        return;
      }

      // Validate Guardian Phone Number
      const guardianNumber = document.getElementById("guardiannumber").value;
      if (!isValidPhoneNumber(guardianNumber)) {
        alert("Invalid Guardian Phone Number");
        event.preventDefault();
        return;
      }

      // Validate Guardian Address
      const guardianAddress = document.getElementById("guardianaddress").value;
      if (guardianAddress.trim() === "") {
        alert("Guardian Address cannot be empty");
        event.preventDefault();
        return;
      }

      // Add more validation checks for other fields...

      // If all validations pass, the form will be submitted
      alert("Form submitted successfully!");
    });

    // Function to validate email format
    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
    // Function to validate Philippine phone number format
    function isValidPhoneNumber(phoneNumber) {
      const phoneNumberRegex = /^(\+?63|0)[\d]{10}$/;
      return phoneNumberRegex.test(phoneNumber);
    }
  });