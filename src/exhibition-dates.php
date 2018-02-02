<!-- Conditional tags for exhibition date info, only displayed on pages with exhibition dates, i.e. Exhibition posts -->
<?php
// Conditional tags to switch between full date or month-year
    if (get_field('display_short_date')) {
        $date_format = 'F Y';
    } else {
        $date_format = 'j F Y';
    }
?>
<div class="exhibition__dates">
    <!-- Start Date -->
    <?php if (get_field('start_date')):
        // get raw start date
        $raw_start_date = get_field('start_date', false, false);
        // make date object
        $start_date = new DateTime($raw_start_date);
    ?>
        <time class="exhibition__start">
            <?php echo date_format($start_date,$date_format); ?>
        </time>
    <?php endif ?>
    <!-- End Date -->
    <?php if (get_field('end_date')):
        // get raw start date
        $raw_end_date = get_field('end_date', false, false);
        // make date object
        $end_date = new DateTime($raw_end_date);
    ?>
        <span>– </span><time class="exhibition__end">
            <!-- Conditional tags to switch between full date or month-year -->
            <?php echo date_format($end_date,$date_format); ?>
        </time>
    <?php endif; ?>
</div>
