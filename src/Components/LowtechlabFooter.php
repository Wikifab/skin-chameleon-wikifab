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
class LowtechlabFooter extends Component {

	/**
	 * Builds the HTML code for this component
	 *
	 * @return String the HTML code
	 */
	public function getHtml() {

		$ret = '
					'. wfMessage( 'wfexternalfootersubtitle-1' )->text() .' <a href="http://wikifab.org" target="_blank"> '. wfMessage( 'wfexternalfootersubtitle-2' )->text() .'</a>. '. wfMessage( 'wfexternalfootersubtitle-3' )->text() .' <a href="http://feedback.wikifab.org" target="_blank"> '. wfMessage( 'wfexternalfootersubtitle-4' )->text() .'</a>.
		';
		return $ret;


		$skinTemplate = $this->getSkinTemplate();

		$ret = $this->indent() . '<!-- ' . htmlspecialchars( $skinTemplate->getMsg( 'toolbox' )->text() ) . '-->' .
			   $this->indent() . '<nav class="navbar navbar-default p-tb ' . $this->getClassString() . '" id="p-tb" ' . Linker::tooltip( 'p-tb' ) . ' >' .
			   $this->indent( 1 ) . '<ul class="nav navbar-nav small">';

		// insert toolbox items
		// TODO: Do we need to care of dropdown menus here? E.g. RSS feeds? See SkinTemplateToolboxEnd.php:1485
		$this->indent( 1 );
		foreach ( $skinTemplate->getToolbox() as $key => $tbitem ) {
			$ret .= $this->indent() . $skinTemplate->makeListItem( $key, $tbitem );
		}

		ob_start();
		// We pass an extra 'true' at the end so extensions using BaseTemplateToolbox
		// can abort and avoid outputting double toolbox links
		wfRunHooks( 'SkinTemplateToolboxEnd', array( &$skinTemplate, true ) );
		$ret .= $this->indent() . ob_get_contents();
		ob_end_clean();

		// insert language links
		if ( array_key_exists( 'language_urls', $skinTemplate->data ) && $skinTemplate->data[ 'language_urls' ] ) {

			$ret .= $this->indent() . '<li class="dropdown dropup p-lang" id="p-lang" ' . Linker::tooltip( 'p-lang' ) . ' >' .
					$this->indent( 1 ) . '<a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">' .
					htmlspecialchars( $skinTemplate->getMsg( 'otherlanguages' )->text() ) . ' <b class="caret"></b>' . '</a>' .
					$this->indent() . '<ul class="dropdown-menu" >';

			$this->indent( 1 );
			foreach ( $skinTemplate->data[ 'language_urls' ] as $key => $langlink ) {
				$ret .= $this->indent() . $skinTemplate->makeListItem( $key, $langlink, array( 'link-class' => 'small' ) );
			}

			$ret .= $this->indent( -1 ) . '</ul>' .
					$this->indent( -1 ) . '</li>';
		}

		$ret .= $this->indent( -1 ) . '</ul>' .
				$this->indent( -1 ) . '</nav>' . "\n";

		return $ret;
	}
}
