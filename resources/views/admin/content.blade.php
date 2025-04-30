<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Content Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .content-section {
            margin-bottom: 2rem;
            padding: 1.5rem;
            border-radius: 0.5rem;
            background-color: #f8f9fa;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .table-responsive {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Content Management</h1>
        
        <!-- Letters Section -->
        <div class="content-section">
            <h2>Letters</h2>
            <form id="addLetterForm" class="mb-3">
                @csrf
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="letter">Letter</label>
                            <input type="text" class="form-control" id="letter" name="letter" maxlength="1" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="letterVoice">Voice File</label>
                            <input type="file" class="form-control" id="letterVoice" name="voice" accept="audio/*" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary w-100">Add Letter</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped" id="lettersTable">
                    <thead>
                        <tr>
                            <th>Letter</th>
                            <th>Voice File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <!-- Numbers Section -->
        <div class="content-section">
            <h2>Numbers</h2>
            <form id="addNumberForm" class="mb-3">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="number" class="form-control" id="number" name="number" min="1" max="20" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="stars">Stars</label>
                            <input type="number" class="form-control" id="stars" name="stars" min="1" max="5" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="numberVoice">Voice File</label>
                            <input type="file" class="form-control" id="numberVoice" name="voice" accept="audio/*" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary w-100">Add Number</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped" id="numbersTable">
                    <thead>
                        <tr>
                            <th>Number</th>
                            <th>Stars</th>
                            <th>Voice File</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <!-- Colors Section -->
        <div class="content-section">
            <h2>Colors</h2>
            <form id="addColorForm" class="mb-3">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="color">Color Name</label>
                            <input type="text" class="form-control" id="color" name="color" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="code">Color Code</label>
                            <input type="color" class="form-control" id="code" name="code" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="submit" class="btn btn-primary w-100">Add Color</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-striped" id="colorsTable">
                    <thead>
                        <tr>
                            <th>Color Name</th>
                            <th>Color Code</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Load initial data
        function loadData() {
            // Load letters
            $.get('/api/letters', function(letters) {
                $('#lettersTable tbody').empty();
                letters.forEach(function(letter) {
                    $('#lettersTable tbody').append(`
                        <tr>
                            <td>${letter.letter}</td>
                            <td>${letter.voice}</td>
                            <td>
                                <button class="btn btn-danger btn-sm delete-letter" data-id="${letter.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `);
                });
            });

            // Load numbers
            $.get('/api/numbers', function(numbers) {
                $('#numbersTable tbody').empty();
                numbers.forEach(function(number) {
                    $('#numbersTable tbody').append(`
                        <tr>
                            <td>${number.number}</td>
                            <td>${number.stars}</td>
                            <td>${number.voice}</td>
                            <td>
                                <button class="btn btn-danger btn-sm delete-number" data-id="${number.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `);
                });
            });

            // Load colors
            $.get('/api/colors', function(colors) {
                $('#colorsTable tbody').empty();
                colors.forEach(function(color) {
                    $('#colorsTable tbody').append(`
                        <tr>
                            <td>${color.color}</td>
                            <td style="background-color: ${color.code}">${color.code}</td>
                            <td>
                                <button class="btn btn-danger btn-sm delete-color" data-id="${color.id}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    `);
                });
            });
        }

        // Add letter
        $('#addLetterForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: '/admin/add-letter',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    loadData();
                    this.reset();
                }
            });
        });

        // Add number
        $('#addNumberForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: '/admin/add-number',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    loadData();
                    this.reset();
                }
            });
        });

        // Add color
        $('#addColorForm').submit(function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: '/admin/add-color',
                type: 'POST',
                data: formData,
                success: function(response) {
                    loadData();
                    this.reset();
                }
            });
        });

        // Delete letter
        $(document).on('click', '.delete-letter', function() {
            let id = $(this).data('id');
            $.ajax({
                url: `/admin/delete-letter/${id}`,
                type: 'DELETE',
                success: function(response) {
                    loadData();
                }
            });
        });

        // Delete number
        $(document).on('click', '.delete-number', function() {
            let id = $(this).data('id');
            $.ajax({
                url: `/admin/delete-number/${id}`,
                type: 'DELETE',
                success: function(response) {
                    loadData();
                }
            });
        });

        // Delete color
        $(document).on('click', '.delete-color', function() {
            let id = $(this).data('id');
            $.ajax({
                url: `/admin/delete-color/${id}`,
                type: 'DELETE',
                success: function(response) {
                    loadData();
                }
            });
        });

        // Load data on page load
        loadData();
    </script>
</body>
</html> 