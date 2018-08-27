<html>
<head>
	<style>
		body {
			background-color:transparent;
			font-size:x-small;
			font-family: Verdana, serif;
			font-weight:bold;
		}
		h2 {
			font-size:small;
		}
		.thork {
			color:#0080FF; /* thork */
		}
		.eve {
			color:#00FF00;  /* eve */
		}
		.rha {
			color:#ff8000; /* rha */
		}
		.past {
			color:#404040;
		}
		.today {
			color:white;
		}
		.tomorrow {
			color:#909090;
		}

		#bosse {
			text-align:center;
			vertical-align:top;
			width:560px;
			height:516px;
			position:relative;
			background-image:url(bossebg.png);
		}
		#bosse div {
			/* background-color:white; */
		}
		#bosse div p {
			padding:0;
			margin:0;
		}

		#thork {
			position:absolute;
			overflow:hidden;

			left:390px;
			top:55px;
			width:136px;

			height:100px;
		}
		#rha {
			position:absolute;
			overflow:hidden;

			left:30px;
			top:365px;
			width:136px;
			height:100px;
		}
		#eve {
			position:absolute;
			overflow:hidden;

			left:390px;
			top:365px;
			width:136px;
			height:100px;
		}
		#tmp {
			position: absolute;
			overflow:hidden;
			left:30px;
			top:55px;
			width:156px;
			height:130px;
			background: #000;
			color:white;
		}
	</style>
</head>
<body>
	<div id="bosse">
		<div id="thork" class="thork">
			<h2>Thorkul</h2>
			<?php printSpawnings("thork", 5); ?>
		</div>
		<div id="eve" class="eve">
			<h2>Evendim</h2>
			<?php printSpawnings("eve", 5); ?>
		</div>
		<div id="rha" class="rha">
			<h2>Daen Rha</h2>
			<?php printSpawnings("rha", 5); ?>
		</div>
<!--
		<div id="tmp">
			<h2>Rey Momo</h2>
			php printSpawnings("momo", 5); ?><br>
			wenn falsch, pls sagen
		</div>
		-->
	</div>
</body>
</html>
<?php
function printSpawnings($boss, $lines) {
		$respawns["thork"]=392404;$respawns["rha"]=392404;$respawns["eve"]=392404; // so lassen
		$respawns["momo"]=10800;
				$ur_spawns["momo"]=1519384750;
					// 20180303 lt nado angepasst
					$ur_spawns["rha"]=1459308374;
					$ur_spawns["eve"]=1458436243;
					$ur_spawns["thork"]=1459163449;
	$spawn=$ur_spawns[$boss];
	$respawn=$respawns[$boss];
	$now=time();
	$now_day=date('d',time());
	while($spawn < $now)
		$spawn += $respawn;
	$spawn -= $respawn;
	if($now_day==date('d',$spawn)) {
		$times[]='<span class="today">Heute, '.date('H:i',$spawn).' Uhr</span>';
	} else {
		$times[] = '<span class="past">' . date('d.m.Y - H:i', $spawn) . ' Uhr</span>';
	}
	for($i=1; $i<$lines; $i++) {
		$spawn += $respawn;
		$spawn_day = date('d', $spawn);
		if($spawn_day==$now_day)
			$times[]='<span class="today">Heute, '.date('H:i',$spawn).' Uhr</span>';
		else if($spawn_day==$now_day+1)
			$times[]='<span class="tomorrow">Morgen, '.date('d.m. - H:i',$spawn).'</span>';
		else
			$times[]=date('d.m.Y - H:i',$spawn).' Uhr';
	}
	foreach($times as $time) {
		echo('<p>'.$time.'</p>');
	}
}
