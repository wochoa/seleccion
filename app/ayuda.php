<?php

function urlactiva($nombreruta)
{
	return request()->routeIs($nombreruta) ? 'kt-menu__item--active':'';
}
function pintaopcion($nombreruta)
{
	
	return request()->routeIs($nombreruta) ? 'class="bg-primary " style="color: #fff"':'class="bg-secondary" style="color: #9a9a9a"';
}