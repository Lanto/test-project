<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9f2ff 100%);
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        .product-card {
            max-width: 760px;
            margin: 80px auto;
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.12);
        }

        .list-group-item {
            border-left: 0;
            border-right: 0;
            padding: 1rem 1.25rem;
            transition: all 0.2s ease;
        }

        .list-group-item:hover {
            background-color: #f8f9ff;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card product-card">
            <div class="card-body p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                    <div>
                        <span class="badge bg-primary rounded-pill mb-2">Boutique</span>
                        <h1 class="display-6 fw-bold mb-0">Liste des produits</h1>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Ajouter</a>
                        <span class="badge bg-dark rounded-pill px-3 py-2 fs-6">
                            {{ $products->count() }} article(s)
                        </span>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($products->isEmpty())
                    <div class="alert alert-info mb-0" role="alert">
                        Aucun produit disponible.
                    </div>
                @else
                    <div class="list-group list-group-flush rounded-4 overflow-hidden">
                        @foreach ($products as $product)
                            <div class="list-group-item d-flex justify-content-between align-items-center gap-3">
                                <div>
                                    <h5 class="mb-1 fw-semibold">{{ $product->name }}</h5>
                                    <small class="text-muted">{{ $product->active ? 'Produit disponible' : 'Produit indisponible' }}</small>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge bg-success-subtle text-success-emphasis rounded-pill px-3 py-2 fs-6">
                                        {{ number_format($product->price, 2, ',', ' ') }} €
                                    </span>
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-primary">Voir</a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>