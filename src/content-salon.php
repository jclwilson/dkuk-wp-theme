<section class="salon">
	<?php if( have_rows('haircuts')): ?>
		<section class="haircuts">
			<h1>Haircuts</h1>
			<table class="salon__prices">
				<thead class="salon__header">
					<tr>
						<th class="salon__heading">Haircut</th>
						<th class="salon__heading">Price</th>
					</tr>
				</thead>
				<tbody class="salon__main">
					<?php while( have_rows('haircuts') ): the_row(); ?>
						<tr class="salon__item">
							<td class="salon__service"><?php the_sub_field('haircut'); ?></td><td class="salon__price"><?php the_sub_field('price'); ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</section>
	<?php endif; ?>
	<?php if( have_rows('colours')): ?>
		<section class="colours">
			<h1>Colours</h1>
			<table class="salon__prices">
				<thead class="salon__header">
					<tr>
						<th class="salon__heading">Colours</th>
						<th class="salon__heading">Price</th>
					</tr>
				</thead>
				<tbody class="salon__main">
					<?php while( have_rows('colours') ): the_row(); ?>
						<tr class="salon__item">
							<td class="salon__service"><?php the_sub_field('colour'); ?></td><td class="salon__price"><?php the_sub_field('price'); ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</section>
		<?php if (get_field('colours_smallprint')):?>
			<small class="colours__smallprint">
				<?php the_field('colours_smallprint'); ?>
			</small>
		<?php endif ?>
	<?php endif; ?>
</section>
