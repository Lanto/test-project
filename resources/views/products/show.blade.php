<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm border-0 rounded-4 mx-auto" style="max-width: 700px;">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="badge bg-info text-dark rounded-pill mb-2">Produit</span>
                        <h1 class="h3 fw-bold mb-0">{{ $product->name }}</h1>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary btn-sm">Retour</a>
                </div>

                <div class="mb-3">
                    <p class="text-muted mb-1">Prix</p>
                    <h4 class="fw-bold mb-0">{{ number_format($product->price, 2, ',', ' ') }} €</h4>
                </div>

                <div class="mb-4">
                    <p class="text-muted mb-1">Statut</p>
                    @if ($product->active)
                        <span class="badge bg-success rounded-pill">Actif</span>
                    @else
                        <span class="badge bg-secondary rounded-pill">Inactif</span>
                    @endif
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning text-dark">Modifier</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
