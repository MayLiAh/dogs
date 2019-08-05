<h1 class="visually-hidden">Список пород</h1>
    <ul class="dogs-list">
        <?php foreach ($breeds as $breed) : ?>
            <li class="dogs-list-item">
                <h2><?=$breed['breed']; ?></h2>
                <img class="dog-image" src="<?=$breed['image']; ?>" width="150" height="120" alt="Порода">
                <p class="dog-description">
                    <?=$breed['about']; ?>
                    <a class="dog-more" target="_blank" href="<?=$breed['link']; ?>">Подробнее</a>
                </p>
            </li>
        <?php endforeach; ?>
    </ul>