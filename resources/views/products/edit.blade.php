<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm border-0 rounded-4 mx-auto" style="max-width: 700px;">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="badge bg-warning text-dark rounded-pill mb-2">Edition</span>
                        <h1 class="h3 fw-bold mb-0">Modifier le produit</h1>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">Retour</a>
                </div>

                <form action="{{ route('products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Prix</label>
                        <input type="number" step="0.01" min="0" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
                        @error('price')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check form-switch mb-4">
                        <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', $product->active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="active">Produit actif</label>
                    </div>

                    <button type="submit" class="btn btn-warning w-100 text-dark">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
