<div class="row"> <!-- Necessary for col beneath -->
    <article <?php post_class('article col-xs col-sm-8 col-sm-offset-2')?>>  <!-- This first wrapper makes the white box that surroundings the article post -->
        <div class="row">  <!-- Necessary for col beneath -->
            <div class="article__container col-xs col-sm-10 col-sm-offset-1">  <!-- This second wrapper contains the article content and ensures it doesn't go right to the edges of the larger white box -->
                <header class="article__header">
                    <h1 class="article__title">Nothing found :(</h1>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                </header>
                <section class="article__content">
                </section>
            </div>
        </div>
    </article>
</div>
