<main class="content">
    <div class="content__main-col">
        <header class="content__header">
            <h2 class="content__header-text">Ошибка</h2>
        </header>
        <article class="lot-list">
            <p class="error"><?=$error;?></p>
        </article>
    </div>
</main>

<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($categories as $category): ?>
                <li class="nav__item">
                    <a href="/category.php?category=<?= $category['symbolic_code']; ?>"><?= htmlspecialchars($category['title']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <section class="lot-item container">
        <h2>404 Страница не найдена</h2>
        <p>Данной страницы не существует на сайте.</p>
    </section>
</main>
