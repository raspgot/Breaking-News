    </main>
    <!-- /.container -->
    
    <footer class="blog-footer">
        <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
        <hr>
        
		<nav class="nav d-flex justify-content-between">
            <?php foreach( get_menu_by_slug("contact") as $item ): ?>
            <a class="p-2 text-muted" href="<?= $item->url ?>"><?= $item->title ?></a>
            <?php endforeach; ?>
        </nav>
    </footer>
    
    <?php wp_footer() ?>
</body>
</html>