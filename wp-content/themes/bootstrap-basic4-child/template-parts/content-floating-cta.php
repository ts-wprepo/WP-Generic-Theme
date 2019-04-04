<!-- customize the floating cta links here -->
<?php ?>
<div class="floating-cta">
	<ul>
		<li>
			<a href="#" class="quote-popup">
				<i class="fa fa-file-text-o"></i>
				<span>Quote</span>
			</a>
		</li>
		<li>
			<a href="tel:<?php echo preg_replace('/[^0-9]/', '', get_field('phone_number', 'option')); ?>">
				<i class="fa fa-phone"></i>
				<span>Call Us</span>
			</a>
		</li> 
	</ul>
</div>