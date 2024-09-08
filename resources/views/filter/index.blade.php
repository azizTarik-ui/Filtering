<!DOCTYPE html>
<html>
<head>
    <title>Filter Schools</title>
</head>
<body>

    <form id="filterform" action="{{ route('filter') }}" method="POST">
        @csrf



        <!-- Division Selection -->
        <label for="division_id">Division:</label>
        <select id="division_id" name="division_id" onchange="this.form.submit()">
            <option value="">Select Division</option>
            @foreach ($divisions as $division)
                <option value="{{ $division->id }}" {{ request('division_id') == $division->id ? 'selected' : '' }}>{{ $division->name }}</option>
            @endforeach
        </select>

        <!-- District Selection -->
        @if (request('division_id'))
            <label for="district_id">District:</label>
            <select id="district_id" name="district_id" onchange="this.form.submit()">
                <option value="">Select District</option>
                @foreach ($districts as $district)
                    <option value="{{ $district->id }}" {{ request('district_id') == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                @endforeach
            </select>
        @endif

        <!-- Upazila Selection -->
        @if (request('district_id') && request('division_id'))
            <label for="upazila_id">Upazila:</label>
            <select id="upazila_id" name="upazila_id" onchange="this.form.submit()">
                <option value="">Select Upazila</option>
                @foreach ($upazilas as $upazila)
                    <option value="{{ $upazila->id }}" {{ request('upazila_id') == $upazila->id ? 'selected' : '' }}>{{ $upazila->name }}</option>
                @endforeach
            </select>
        @endif

        <!-- Submit Button -->
        <button type="submit">Filter Schools</button>
    </form>

    <!-- Display Schools -->
    @if (isset($schools))
        <h2>Schools in Selected Upazila:</h2>
        <ul>
            @foreach ($schools as $school)
                <li>{{ $school->name }}</li>
            @endforeach
        </ul>
    @endif
</body>

</html>
