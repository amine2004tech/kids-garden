<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Content Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .admin-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .admin-header {
            background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
            color: white;
            padding: 2rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-group-custom {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        .btn-custom {
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: white;
            border: none;
            transition: transform 0.2s;
            font-weight: 500;
        }
        .btn-custom:hover {
            transform: translateY(-2px);
            color: white;
        }
        .btn-letter {
            background: #FF6B6B;
        }
        .btn-number {
            background: #4ECDC4;
        }
        .btn-color {
            background: #45B7D1;
        }
        .btn-edit {
            background: #FFD93D;
            color: #000;
            margin-right: 0.5rem;
        }
        .btn-delete {
            background: #dc3545;
            color: white;
        }
        .content-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        .content-type-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.875rem;
            margin-right: 0.5rem;
        }
        .badge-letter {
            background: #FFE3E3;
            color: #FF6B6B;
        }
        .badge-number {
            background: #E3FDFD;
            color: #4ECDC4;
        }
        .badge-color {
            background: #E3F6FF;
            color: #45B7D1;
        }
        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="display-4">gg you are admin</h1>
            <p class="lead">Manage your content here</p>
            <div class="btn-group-custom">
                <a href="#" class="btn-custom btn-letter" id="addLetterBtn">
                    <i class="fas fa-font"></i> Add Letter
                </a>
                <a href="#" class="btn-custom btn-number" id="addNumberBtn">
                    <i class="fas fa-hashtag"></i> Add Number
                </a>
                <a href="#" class="btn-custom btn-color" id="addColorBtn">
                    <i class="fas fa-palette"></i> Add Color
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Content</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Letters -->
                                    @foreach($letters ?? [] as $letter)
                                        <tr>
                                            <td><span class="content-type-badge badge-letter">Letter</span></td>
                                            <td>{{ $letter->value }}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn btn-custom btn-edit" onclick="editContent('letter', {{ $letter->id }})">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-custom btn-delete" onclick="deleteContent('letter', {{ $letter->id }})">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!-- Numbers -->
                                    @foreach($numbers ?? [] as $number)
                                        <tr>
                                            <td><span class="content-type-badge badge-number">Number</span></td>
                                            <td>{{ $number->value }}</td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn btn-custom btn-edit" onclick="editContent('number', {{ $number->id }})">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-custom btn-delete" onclick="deleteContent('number', {{ $number->id }})">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!-- Colors -->
                                    @foreach($colors ?? [] as $color)
                                        <tr>
                                            <td><span class="content-type-badge badge-color">Color</span></td>
                                            <td>
                                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                                    <div style="width: 20px; height: 20px; background-color: {{ $color->value }}; border-radius: 50%;"></div>
                                                    {{ $color->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action-buttons">
                                                    <button class="btn btn-custom btn-edit" onclick="editContent('color', {{ $color->id }})">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </button>
                                                    <button class="btn btn-custom btn-delete" onclick="deleteContent('color', {{ $color->id }})">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function editContent(type, id) {
            console.log('Edit', type, id);
            // Implement edit functionality
        }

        function deleteContent(type, id) {
            if (confirm(`Are you sure you want to delete this ${type}?`)) {
                console.log('Delete', type, id);
                // Implement delete functionality
            }
        }

        document.getElementById('addLetterBtn').addEventListener('click', function() {
            console.log('Add new letter');
            // Implement add letter functionality
        });

        document.getElementById('addNumberBtn').addEventListener('click', function() {
            console.log('Add new number');
            // Implement add number functionality
        });

        document.getElementById('addColorBtn').addEventListener('click', function() {
            console.log('Add new color');
            // Implement add color functionality
        });
    </script>
</body>
</html> 