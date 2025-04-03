<?php 
    /* Template Name: Registro de Avatar */
    get_header();
    $post = get_post();
?>

<main class="post page avatar-register">
    <div class="container">
        <div class="content">
            <h1><?= get_the_title() ?></h1>
            <?= the_content() ?>
            <form id="userForm">
                <div class="row">
                    <div class="column">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" placeholder="Escolha um username" required>
                        
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" placeholder="seu@email.com" required>

                        <button type="submit" class="btn pink" id="avatarRegisterSubmitBtn">Salvar avatar</button>
                    </div>
                    <div class="column">
                        <div class="avatar-container">
                            <div id="avatarLoader" class="avatar-loader" style="display: none;"></div>
                            <img id="avatarPreview" src="" alt="Avatar" style="display: none;">
                        </div>

                        <input type="hidden" name="avatar" id="avatar">
                        <button type="button" id="randomAvatarBtn" class="btn">Randomizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<?php get_footer(); ?>
