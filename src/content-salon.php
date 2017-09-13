<?php if( have_rows('salon_prices') ): ?>
	<section class="salon">
		<table class="salon__prices">
			<thead class="salon__header">
				<tr>
					<th class="salon__heading">Haircut</th>
					<th class="salon__heading">Price</th>
				</tr>
			</thead>
			<tbody class="salon__main">
				<?php while( have_rows('salon_prices') ): the_row(); ?>
					<tr class="salon__item">
						<td class="salon__haircut"><?php the_sub_field('haircut'); ?></td><td class="salon__price"><?php the_sub_field('price'); ?></td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</section>
<?php endif; ?>
