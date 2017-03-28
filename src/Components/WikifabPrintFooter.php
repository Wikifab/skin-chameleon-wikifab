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
class WikifabPrintFooter extends Component {

	/**
	 * Builds the HTML code for this component
	 *
	 * @return String the HTML code
	 */
	public function getHtml() {

		$ret = '<div class="printWikifabFooter">
					'. wfMessage( 'wffootersubtitle-1' )->text() .' <span class="glyphicon glyphicon-heart" style="color:red" aria-hidden="true"></span> '. wfMessage( 'wffootersubtitle-2' )->text() .'.
		</div>';
		return $ret;
	}
}
