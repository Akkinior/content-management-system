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
        <li><a href="/admin">Home</a></li>
        {{--<li class="dropdown">
            <a href="#">Skibidi</a>
             <ul class="dropdown-menu">
                <li><a href="/skibidi/test">Test</a></li>
                <li><a href="/skibidi/options">Options</a></li>
            </ul>
        </li>--}}
        <li><a href="/users">User Management</a></li>
        <li><a href="/pages">Page Management</a></li>
        <li><a href="/services">Services Management</a></li>
        <li><a href="/cards">Card Management</a></li>
        <li><a href="/steps">Steps Management</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: blue; cursor: pointer; text-decoration: underline;">Log Out</button>
            </form>
        </li>
    </ul>
</nav>

<main>{{ $slot }}</main>

<script>
    document.querySelectorAll('.dropdown > a').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const dropdown = link.parentElement;
            dropdown.classList.toggle('active');
        });
    });
</script>

</body>
<footer class="footer">
    <p>&copy; 2026 Something2. All rights reserved.</p>
</footer>
</html>
