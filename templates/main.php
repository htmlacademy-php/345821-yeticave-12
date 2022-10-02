<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное
        сноубордическое и горнолыжное снаряжение.</p>
    <ul class="promo__list">
        <!--заполните этот список из массива категорий-->
        <?php foreach ($categories as $cat):?>
            <li class="promo__item promo__item--<?= $cat['code']; ?>">
                <a class="promo__link" href="all-lots.php?category_id=<?= $cat['id']; ?>">  <?=htmlspecialchars($cat['name']);?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>
    <ul class="lots__list">
        <!--заполните этот список из массива с товарами-->
        <?php foreach ($lots as $lot):?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?=htmlspecialchars($lot['img_link']);?>" width="350" height="260" alt="<?=$lot['name']?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?=htmlspecialchars($lots['c.name']);?></span>
                    <h3 class="lot__title">
                        <a class="text-link" href="lot.php?id=<?= htmlspecialchars($lots['id']); ?>">
                            <?=htmlspecialchars($lots['name']);?></a></h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount"><?=htmlspecialchars($lot['start_price']); ?></span>
                            <span class="lot__cost"><?=htmlspecialchars(retail_price($lot['start_price'])); ?></span>
                        </div>
                        <div class="lot__timer timer<?=view_class($lot['end_date'])?>">
                            <?=expired_time($lot['end_date']);?>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

