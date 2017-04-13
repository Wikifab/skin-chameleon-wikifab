<?php
/**
 * File containing the Wikifab Footer class
 *
 *
 * @file
 * @ingroup   Skins
 */

namespace Skins\Chameleon\Components;

use Linker;

/**
 * ToolbarHorizontal class
 *
 * A horizontal toolbar containing standard sidebar items (toolbox, language links).
 *
 * The toolbar is an unordered list in a nav element: <nav role="navigation" id="p-tb" >
 *
 * @author Stephan Gambke
 * @since 1.0
 * @ingroup Skins
 */
class WikifabPrintHeader extends Component {

	/**
	 * Builds the HTML code for this component
	 *
	 * @return String the HTML code
	 */
	public function getHtml() {

		// get page info :
		$pageUrl = " " . $this->getSkin()->getTitle()->getFullURL();
		$timestamp = $this->getSkin()->getOutput()->getRevisionTimestamp();
		$lasteditDate = $this->getSkin()->getLanguage()->userDate( $timestamp, $this->getSkin()->getUser() );
		$lasteditTime = $this->getSkin()->getLanguage()->userTime( $timestamp, $this->getSkin()->getUser() );

		$ret = \Html::openElement("div", array('class'=> 'printWikifabHeader'));
		$ret .= \Html::openElement("div", array('class'=> 'container'));
		$ret .= \Html::openElement("div", array('class'=> 'row'));

		// Logo
		$ret .= \Html::openElement("div", array('class'=> 'col-md-2 logo'));
		$ret .= \Html::element( 'img',
				array(
						'src' => $this->getSkinTemplate()->data[ 'logopath' ],
						'alt' => $this->getSkinTemplate()->data[ 'sitename' ],
				)
				);
		// close logo div
		$ret .= \Html::closeElement("div");

		// title
		$ret .= \Html::openElement("div", array('class'=> 'col-md-10 title'));
		$ret .= \Html::Element("h1", array('class'=> 'footerText firstHeading'), $this->getSkinTemplate()->data['title']);

		$ret .= \Html::openElement("span",['class' => 'urllink']);
		//$ret .= wfMessage( 'wfprint-pagelink', $pageUrl );
		$ret .= $pageUrl ;
		$ret .= \Html::closeElement("span");

		//$ret .= \Html::Element("span",['class' => 'lastedit'], wfMessage( 'wfprint-versionnumber', $lasteditDate, $lasteditTime )->parse());

		//close title div
		$ret .= \Html::closeElement("div");


		// close row div
		$ret .= \Html::closeElement("div");
		// close container div
		$ret .= \Html::closeElement("div");
		// close printWikifabHeader div
		$ret .= \Html::closeElement("div");

		/*
		var_dump($this->getSkinTemplate()->data['lastmod']);

		var_dump($d); echo '<br/>';
		var_dump($t); echo '<br/>';
		var_dump($s); echo '<br/>';

		foreach ($this->getSkinTemplate()->data as $key => $val) {
			echo "$key <br/>";
		}*/

		return $ret;
	}
}
