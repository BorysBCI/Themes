<?php get_header();?>
            <section class="pageTop">
                <div class="container">
                    <h2 ><?php the_title();?></h2>
                </div>
            </section>
            <section class="articlePage">
                <div class="container">
                    <!--<div class="imageStretched"><?php //the_post_thumbnail( 'full' );?></div>-->
					<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); 
							the_content();
						} // end while
					} // end if
					?>
					
                    <!--<h1>title h1</h1>
                    <h2>title h2</h2>
                    <h3>title h3</h3>
                    <h4>title h4</h4>
                    <h5>title h5</h5>
                    <h6>title h6</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda autem commodi illum labore perspiciatis praesentium suscipit. Dolorem ea et eum iure iusto laboriosam laudantium nostrum perferendis sequi veritatis. At delectus, dolores doloribus ea eos ex exercitationem expedita facilis ipsa ipsum pariatur qui sequi similique soluta, unde veniam voluptatum. Aperiam architecto blanditiis illum, non soluta suscipit vel voluptate voluptatum. Asperiores consequatur deleniti, dicta ducimus eveniet neque obcaecati officiis omnis placeat quae quaerat quibusdam quod reiciendis sit unde ut voluptatem. Accusamus alias at beatae delectus dolor eaque eius eos fugiat fugit ipsum laboriosam magni nam, nulla, quo saepe sit tenetur ullam velit.</p>
                    <ul>
                        <li>list</li>
                        <li>list</li>
                        <li>list</li>
                    </ul>
                    <ol>
                        <li>list</li>
                        <li>list</li>
                        <li>list</li>
                    </ol>-->
                </div>
            </section>
<?php get_footer();?>