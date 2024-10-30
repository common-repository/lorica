<?php
/**
 * @package lorica
 * @version 1
 */
/*
Plugin Name: Lorica
Taken from (well- ripped off from) Plugin URI: http://wordpress.org/extend/plugins/hello-dolly/
Plugin URI: http://wordpress.org/extend/plugins/lorica
Description: This is the Hello Dolly plugin with the words changed and some variable names too! Wordpress is a great tool and this is a VERY SMALL contribution back to the developers. Imitation is the sincerest form of flattery! This is not just a plugin, it symbolizes the hope and enthusiasm of hundreds of generations summed up in prayer of St Patrick (St. Patrick (ca. 377). When activated you will randomly see a line from <cite>The Lorica of St Patrick</cite> in the upper right of your admin screen on every page. Text taken from http://www.ewtn.com/devotionals/prayers/patrick.htm
Author: KevinColyer (building on Matt Mullenweg's Hello Dolly plugin)
Version: 1.6
Author URI: http://www.thecolyers.net
*/

function lorica() {
	/** This the Lorica of St Patrick adapted for Wordpress... */
	$theprayer = "I arise today: Through a mighty strength, the invocation of the Trinity,
I arise today: Through a belief in the Threeness,
I arise today: Through confession of the Oneness of the Creator of creation.
I arise today: Through the strength of Christ's birth and His baptism,
I arise today: Through the strength of His crucifixion and His burial,
I arise today: Through the strength of His resurrection and His ascension,
I arise today: Through the strength of His descent for the judgment of doom.
I arise today: Through the strength of the love of cherubim,
I arise today: In obedience of angels,
I arise today: In service of archangels,
I arise today: In the hope of resurrection to meet with reward,
I arise today: In the prayers of patriarchs,
I arise today: In preachings of the apostles,
I arise today: In faiths of confessors,
I arise today: In innocence of virgins,
I arise today: In deeds of righteous men.
I arise today: Through the strength of heaven;
I arise today: Light of the sun,
I arise today: Splendor of fire,
I arise today: Speed of lightning,
I arise today: Swiftness of the wind,
I arise today: Depth of the sea,
I arise today: Stability of the earth,
I arise today: Firmness of the rock.
I arise today: Through God's strength to pilot me;
I arise today: God's might to uphold me,
I arise today: God's wisdom to guide me,
I arise today: God's eye to look before me,
I arise today: God's ear to hear me,
I arise today: God's word to speak for me,
I arise today: God's hand to guard me,
I arise today: God's way to lie before me,
I arise today: God's shield to protect me,
I arise today: God's hosts to save me, from snares of the devil,
I arise today: God's hosts to save me, from temptations of vices,
I arise today: From every one who desires me ill, Afar and anear,
I arise today: From every one who desires me ill, Alone or in a mulitude.
I summon today all these powers between me and evil,
I summon today Gods powers: Against every cruel merciless power that opposes my body and soul,
I summon today Gods powers: Against incantations of false prophets,
I summon today Gods powers: Against black laws of pagandom,
I summon today Gods powers: Against false laws of heretics,
I summon today Gods powers: Against craft of idolatry,
I summon today Gods powers: Against spells of women and smiths and wizards,
I summon today Gods powers: Against every knowledge that corrupts man's body and soul.
Christ shield me today: Against poison, against burning,
Christ shield me today: Against drowning, against wounding,
Christ shield me today: So that reward may come to me in abundance.
Christ with me, Christ before me, Christ behind me,
Christ in me, Christ beneath me, Christ above me,
Christ on my right, Christ on my left,
Christ when I lie down, Christ when I sit down,
Christ in the heart of every man who thinks of me,
Christ in the mouth of every man who speaks of me,
Christ in the eye that sees me,
Christ in the ear that hears me.
I arise today: Through a mighty strength, the invocation of the Trinity,
I arise today: Through a belief in the Threeness,
I arise today: Through a confession of the Oneness
I arise today: Of the Creator of creation";

	// Here we split it into lines
	$theprayer = explode( "\n", $theprayer );

	// And then randomly choose a line
	return wptexturize( $theprayer[ mt_rand( 0, count( $theprayer ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function lorica_of_st_patrick() {
	$chosen = lorica();
	echo "<p id='dolly'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'lorica_of_st_patrick' );

// We need some CSS to position the paragraph
function dolly_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'dolly_css' );

?>
