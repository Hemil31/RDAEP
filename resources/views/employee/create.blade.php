<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Form</title>
</head>

<body>
    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- First Name -->
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
        @error('first_name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Last Name -->
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
        @error('last_name')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Email -->
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Country Code -->
        <label for="country_code">Country Code</label>
        <select name="country_code" id="country_code">
            <option value="+91" {{ old('country_code') == '+91' ? 'selected' : '' }}>+91 (India)</option>
            <option value="+1" {{ old('country_code') == '+1' ? 'selected' : '' }}>+1 (USA)</option>
            <option value="+44" {{ old('country_code') == '+44' ? 'selected' : '' }}>+44 (UK)</option>
            <option value="+61" {{ old('country_code') == '+61' ? 'selected' : '' }}>+61 (Australia)</option>
        </select>
        @error('country_code')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Mobile Number -->
        <label for="mobile_number">Mobile Number</label>
        <input type="number" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}" placeholder="Enter your mobile number">
        @error('mobile_number')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Address -->
        <label for="address">Address</label>
        <input type="text" name="address" id="address" value="{{ old('address') }}">
        @error('address')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Gender -->
        <label for="gender">Gender:</label><br>
        <input type="radio" name="gender" id="male" value="0" {{ old('gender') == '0' ? 'checked' : '' }}>
        <label for="male">Male</label><br>

        <input type="radio" name="gender" id="female" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>
        <label for="female">Female</label><br>

        <input type="radio" name="gender" id="other" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>
        <label for="other">Other</label>
        @error('gender')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <!-- Hobbies -->
        <label for="hobbies">Hobbies:</label><br>
        <input type="checkbox" name="hobbies[]" id="reading" value="1" {{ in_array(1, old('hobbies', [])) ? 'checked' : '' }}>
        <label for="reading">Reading</label><br>

        <input type="checkbox" name="hobbies[]" id="traveling" value="2" {{ in_array(2, old('hobbies', [])) ? 'checked' : '' }}>
        <label for="traveling">Traveling</label><br>

        <input type="checkbox" name="hobbies[]" id="sports" value="3" {{ in_array(3, old('hobbies', [])) ? 'checked' : '' }}>
        <label for="sports">Sports</label><br>

        <input type="checkbox" name="hobbies[]" id="music" value="4" {{ in_array(4, old('hobbies', [])) ? 'checked' : '' }}>
        <label for="music">Music</label><br>

        <input type="checkbox" name="hobbies[]" id="coding" value="5" {{ in_array(5, old('hobbies', [])) ? 'checked' : '' }}>
        <label for="coding">Coding</label><br><br>
        @error('hobbies')
            <div style="color: red;">{{ $message }}</div>
        @enderror

        <!-- Upload Photo -->
        <label for="photo">Upload Photo:</label>
        <input type="file" name="photo" id="photo" accept="image/*">
        @error('photo')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        <br><br>

        <button type="submit">Submit</button>
    </form>

</body>

</html>
