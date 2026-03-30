<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Unknown' }}</title>
    <link rel="stylesheet" href="/admin.css">
    
</head>
<body>

<nav>
    <ul>
        <li><a href="/">Home</a></li>
        <li><a href="/#">null</a></li>
        </li>
        <li><a href="/#">Null</a></li>
    </ul>
</nav>

<main>{{ $slot }}</main>

{{-- <script>
    document.querySelectorAll('.dropdown > a').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const dropdown = link.parentElement;
            dropdown.classList.toggle('active');
        });
    });
</script> --}}

</body>
<footer class="footer">
    <p>&copy; 2026 Something2. All rights reserved.</p>
</footer>
</html>