<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits</title>
</head>
<body>
    <h1>Liste des produits</h1>

    @if ($products->isEmpty())
        <p>Aucun produit disponible.</p>
    @else
        <ul>
            @foreach ($products as $product)
                <li>
                    {{ $product->name }}
                    -
                    {{ number_format($product->price, 2, ',', ' ') }} €
                </li>
            @endforeach
        </ul>
    @endif
</body>
</html>