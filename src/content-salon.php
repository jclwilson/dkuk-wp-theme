<?php if( have_rows('salon_prices') ): ?>
	<section class="salon">
		<table class="salon__prices">
			<thead>
				<tr>
					<th>Haircut</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php while( have_rows('salon_prices') ): the_row(); ?>
					<tr>
						<td><?php the_sub_field('haircut'); ?></td><td><?php the_sub_field('price'); ?></td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</section>
<?php endif; ?>
