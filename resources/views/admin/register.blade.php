<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Clinic Flow</title>
  <link rel="icon" type="image/x-icon" href="/static/favicon.ico">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            aqua: '#68D6EC',
            aquaDark: '#4cb4c9'
          }
        }
      }
    }
  </script>
  <style>
    .input-focus:focus-within {
      box-shadow: 0 0 0 3px rgba(104, 214, 236, 0.3);
      border-color: #68D6EC;
    }
    .input-error {
      border-color: #ef4444;
    }
    .input-error:focus-within {
      box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.3);
      border-color: #ef4444;
    }
    .shake {
      animation: shake 0.5s ease-in-out;
    }
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
      20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
  <div class="max-w-md w-full bg-white rounded-xl shadow-lg overflow-hidden">
    <!-- Header -->
    <div class="bg-aqua py-6 px-8 text-center">
      <h1 class="text-3xl font-bold text-white">Create Account</h1>
      <p class="text-white/90 mt-2">Dive into your new experience</p>
    </div>

    <!-- Form -->
    <form method="POST" action="#" class="p-8" id="registerForm">
      <!-- CSRF Token Simulation -->
      <input type="hidden" name="_token" id="csrf_token" value="simulated-csrf-token">
      
      <!-- Success Message Container -->
      <div id="successMessage" class="hidden mb-4 bg-green-50 border-l-4 border-green-500 p-4 rounded">
        <div class="flex items-center">
          <i data-feather="check-circle" class="text-green-500 mr-2"></i>
          <span class="text-green-700 text-sm">Registration successful! Redirecting...</span>
        </div>
      </div>

      <!-- Error Message Container -->
      <div id="formErrors" class="hidden mb-4 bg-red-50 border-l-4 border-red-500 p-4 rounded">
        <div class="flex items-center">
          <i data-feather="alert-triangle" class="text-red-500 mr-2"></i>
          <span class="text-red-700 text-sm" id="errorText"></span>
        </div>
      </div>

      <div class="space-y-6">
        <!-- Name -->
        <div class="transition-all duration-200 border border-gray-200 rounded-lg px-4 py-3 input-focus" id="nameContainer">
          <label for="name" class="block text-sm font-medium text-gray-600 mb-1">Full Name</label>
          <div class="flex items-center">
            <i data-feather="user" class="text-gray-400 mr-2"></i>
            <input 
              type="text" 
              id="name"
              name="name" 
              required 
              autofocus
              autocomplete="name"
              class="w-full outline-none bg-transparent placeholder-gray-300 text-gray-700"
              placeholder="John Doe"
            >
          </div>
          <p class="hidden text-red-500 text-xs mt-1 flex items-center" id="nameError">
            <i data-feather="alert-circle" class="w-3 h-3 mr-1"></i>
            <span class="error-message"></span>
          </p>
        </div>

        <!-- Email -->
        <div class="transition-all duration-200 border border-gray-200 rounded-lg px-4 py-3 input-focus" id="emailContainer">
          <label for="email" class="block text-sm font-medium text-gray-600 mb-1">Email Address</label>
          <div class="flex items-center">
            <i data-feather="mail" class="text-gray-400 mr-2"></i>
            <input 
              type="email" 
              id="email"
              name="email" 
              required 
              autocomplete="email"
              class="w-full outline-none bg-transparent placeholder-gray-300 text-gray-700"
              placeholder="you@example.com"
            >
          </div>
          <p class="hidden text-red-500 text-xs mt-1 flex items-center" id="emailError">
            <i data-feather="alert-circle" class="w-3 h-3 mr-1"></i>
            <span class="error-message"></span>
          </p>
        </div>

        <!-- Password -->
        <div class="transition-all duration-200 border border-gray-200 rounded-lg px-4 py-3 input-focus" id="passwordContainer">
          <label for="password" class="block text-sm font-medium text-gray-600 mb-1">Password</label>
          <div class="flex items-center">
            <i data-feather="lock" class="text-gray-400 mr-2"></i>
            <input 
              type="password" 
              id="password"
              name="password" 
              required 
              autocomplete="new-password"
              class="w-full outline-none bg-transparent placeholder-gray-300 text-gray-700"
              placeholder="••••••••"
            >
          </div>
          <p class="hidden text-red-500 text-xs mt-1 flex items-center" id="passwordError">
            <i data-feather="alert-circle" class="w-3 h-3 mr-1"></i>
            <span class="error-message"></span>
          </p>
        </div>

        <!-- Confirm Password -->
        <div class="transition-all duration-200 border border-gray-200 rounded-lg px-4 py-3 input-focus" id="passwordConfirmationContainer">
          <label for="password_confirmation" class="block text-sm font-medium text-gray-600 mb-1">Confirm Password</label>
          <div class="flex items-center">
            <i data-feather="lock" class="text-gray-400 mr-2"></i>
            <input 
              type="password" 
              id="password_confirmation"
              name="password_confirmation" 
              required 
              autocomplete="new-password"
              class="w-full outline-none bg-transparent placeholder-gray-300 text-gray-700"
              placeholder="••••••••"
            >
          </div>
          <p class="hidden text-red-500 text-xs mt-1 flex items-center" id="passwordConfirmationError">
            <i data-feather="alert-circle" class="w-3 h-3 mr-1"></i>
            <span class="error-message"></span>
          </p>
        </div>

        <!-- Terms and Conditions -->
        <div class="flex items-start space-x-2" id="termsContainer">
          <input 
            type="checkbox" 
            id="terms"
            name="terms" 
            required
            class="mt-1 rounded border-gray-300 text-aqua focus:ring-aqua"
          >
          <label for="terms" class="text-sm text-gray-600">
            I agree to the 
            <a href="#" class="text-aqua hover:text-aquaDark font-medium">Terms of Service</a> 
            and 
            <a href="#" class="text-aqua hover:text-aquaDark font-medium">Privacy Policy</a>
          </label>
        </div>
        <p class="hidden text-red-500 text-xs mt-1 flex items-center" id="termsError">
          <i data-feather="alert-circle" class="w-3 h-3 mr-1"></i>
          You must accept the terms and conditions
        </p>

        <!-- Submit Button -->
        <button 
          type="submit" 
          class="w-full bg-aqua hover:bg-aquaDark text-white font-medium py-3 px-4 rounded-lg transition duration-200 flex items-center justify-center"
          id="submitBtn"
        >
          <i data-feather="user-plus" class="mr-2"></i>
          Register Now
        </button>

        <!-- Login Link -->
        <p class="text-center text-gray-500 text-sm">
          Already have an account? 
          <a href="#" class="text-aqua hover:text-aquaDark font-medium" id="loginLink">Sign in</a>
        </p>
      </div>
    </form>
  </div>

  <script>
    feather.replace();
    
    // Form submission handler
    document.getElementById('registerForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Hide previous errors and success messages
      hideAllErrors();
      document.getElementById('formErrors').classList.add('hidden');
      document.getElementById('successMessage').classList.add('hidden');
      
      // Get form values
      const formData = {
        name: document.getElementById('name').value.trim(),
        email: document.getElementById('email').value.trim(),
        password: document.getElementById('password').value,
        password_confirmation: document.getElementById('password_confirmation').value,
        terms: document.getElementById('terms').checked,
        _token: document.getElementById('csrf_token').value
      };
      
      // Validate form
      const errors = validateForm(formData);
      
      if (Object.keys(errors).length === 0) {
        // Simulate successful registration
        simulateRegistration(formData);
      } else {
        // Display errors
        displayErrors(errors);
      }
    });
    
    // Form validation
    function validateForm(data) {
      const errors = {};
      
      // Name validation
      if (!data.name) {
        errors.name = 'The name field is required.';
      } else if (data.name.length < 2) {
        errors.name = 'The name must be at least 2 characters.';
      }
      
      // Email validation
      if (!data.email) {
        errors.email = 'The email field is required.';
      } else if (!isValidEmail(data.email)) {
        errors.email = 'Please enter a valid email address.';
      }
      
      // Password validation
      if (!data.password) {
        errors.password = 'The password field is required.';
      } else if (data.password.length < 8) {
        errors.password = 'The password must be at least 8 characters.';
      }
      
      // Password confirmation
      if (data.password !== data.password_confirmation) {
        errors.password_confirmation = 'The passwords do not match.';
      }
      
      // Terms validation
      if (!data.terms) {
        errors.terms = 'You must accept the terms and conditions.';
      }
      
      return errors;
    }
    
    // Email validation helper
    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
    
    // Display errors
    function displayErrors(errors) {
      for (const field in errors) {
        const errorElement = document.getElementById(field + 'Error');
        const containerElement = document.getElementById(field + 'Container');
        
        if (errorElement && containerElement) {
          errorElement.querySelector('.error-message').textContent = errors[field];
          errorElement.classList.remove('hidden');
          containerElement.classList.add('input-error', 'shake');
          
          setTimeout(() => {
            containerElement.classList.remove('shake');
          }, 500);
        }
      }
      
      // Show general form errors if any
      if (errors.form) {
        document.getElementById('errorText').textContent = errors.form;
        document.getElementById('formErrors').classList.remove('hidden');
      }
    }
    
    // Hide all errors
    function hideAllErrors() {
      const errorElements = document.querySelectorAll('[id$="Error"]');
      const containerElements = document.querySelectorAll('[id$="Container"]');
      
      errorElements.forEach(el => el.classList.add('hidden'));
      containerElements.forEach(el => el.classList.remove('input-error'));
    }
    
    // Simulate registration process
    function simulateRegistration(formData) {
      const submitBtn = document.getElementById('submitBtn');
      const originalText = submitBtn.innerHTML;
      
      // Show loading state
      submitBtn.innerHTML = '<i data-feather="loader" class="mr-2 animate-spin"></i>Processing...';
      submitBtn.disabled = true;
      feather.replace();
      
      // Simulate API call
      setTimeout(() => {
        // For demo purposes - always succeed
        // In real application, you would make an actual API call here
        
        document.getElementById('successMessage').classList.remove('hidden');
        
        // Redirect to login after success
        setTimeout(() => {
          window.location.href = '/login'; // Change this to your actual login route
        }, 2000);
        
      }, 1500);
    }
    
    // Real-time password confirmation validation
    document.getElementById('password_confirmation').addEventListener('input', function() {
      const password = document.getElementById('password').value;
      const confirmPassword = this.value;
      const errorElement = document.getElementById('passwordConfirmationError');
      const containerElement = document.getElementById('passwordConfirmationContainer');
      
      if (confirmPassword && password !== confirmPassword) {
        errorElement.querySelector('.error-message').textContent = 'The passwords do not match.';
        errorElement.classList.remove('hidden');
        containerElement.classList.add('input-error');
      } else {
        errorElement.classList.add('hidden');
        containerElement.classList.remove('input-error');
      }
    });
    
    // Login link handler
    document.getElementById('loginLink').addEventListener('click', function(e) {
      e.preventDefault();
      window.location.href = '/login'; // Change this to your actual login route
    });
  </script>
</body>
</html>