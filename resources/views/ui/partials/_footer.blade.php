<footer class="footer footer-default">
    <div class="container">
        <nav class="float-left">
            <ul>
                <li>
                    <a href="{{ route('home') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('group') }}">
                        Translate Group
                    </a>
                </li>
                <li>
                    <a href="{{ route('manga') }}">
                        Manga List
                    </a>
                </li>
                <li>
                    <a href="http://blog.creative-tim.com">
                        Gallery
                    </a>
                </li>
                <li>
                    <a href="https://creative-tim.com/presentation">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="https://www.creative-tim.com/license">
                        Contact Us
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright float-right">
            &copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="{{ route('home') }}" target="_blank">Global Comics</a> for a better community.
        </div>
    </div>
</footer>