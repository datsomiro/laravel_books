<h1>Hello <?php echo $user ?> <?php echo $surname ?> form test View!</h1>

<h1>Hello {{ $user }} {{ $surname }} form test View!</h1>

<?php echo htmlspecialchars($description) ?>

{{ $description }}

{!! $description !!}

<!--
    This is html comment
-->

{{-- This is a blade comment wisible only in source code --}}


<h1>sdfasdfasdf</h1>

{{-- Vanilla PHP --}}
<?php if($age >= 18) : ?>
    <p>You can buy wine here: link</p>
<?php else: ?>
    <p>Sorry you are too young to buy wine</p>
<?php endif; ?>

{{-- Blade --}}
@if ($age >= 18)
    <p>You can buy wine here: link</p>
@else
    <p>Sorry you are too young to buy wine</p>
@endif




<p>Lorem ipsum...</p>

<?php echo 1 + 2 ?>
