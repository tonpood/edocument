<?php
/**
 * @filesource modules/edocument/views/view.php
 * @link http://www.kotchasan.com/
 * @copyright 2016 Goragod.com
 * @license http://www.kotchasan.com/license/
 */

namespace Edocument\View;

use \Kotchasan\Date;
use \Kotchasan\Text;

/**
 * แสดงรายละเอียดของเอกสาร (modal)
 *
 * @author Goragod Wiriya <admin@goragod.com>
 *
 * @since 1.0
 */
class View extends \Gcms\View
{

  /**
   * แสดงฟอร์ม Modal สำหรับแสดงรายละเอียดของเอกสาร
   *
   * @param object $index
   * @param array $login
   * @return string
   */
  public function render($index, $login)
  {
    $content = array();
    $content[] = '<article class=edocument_view>';
    $content[] = '<header><h3 class=icon-file>{LNG_Details of} {LNG_Document}</h3></header>';
    $content[] = '<div class=table>';
    $content[] = '<p class=tr><span class="td icon-number">{LNG_Document No.}</span><span class=td>:</span><span class=td>'.$index->document_no.'</span></p>';
    $content[] = '<p class=tr><span class="td icon-file">{LNG_Document title}</span><span class=td>:</span><span class=td>'.$index->topic.'</span></p>';
    $content[] = '<p class=tr><span class="td icon-customer">{LNG_Sender}</span><span class=td>:</span><span class=td>'.\Edocument\Sender\Model::init()->get($index->sender_id).'</span></p>';
    $content[] = '<p class=tr><span class="td icon-calendar">{LNG_date}</span><span class=td>:</span><span class=td>'.Date::format($index->last_update).'</span></p>';
    $content[] = '<p class=tr><span class="td icon-edit">{LNG_Detail}</span><span class=td>:</span><span class=td>'.$index->detail.'</span></p>';
    $content[] = '<p class=tr><span class="td icon-star0">{LNG_Status}</span><span class=td>:</span>';
    if (empty($index->new)) {
      $content[] = '<span class="td icon-email-unread color-red">{LNG_New}';
    } else {
      $content[] = '<span class="td icon-email-read color-green">{LNG_Received}';
    }
    $content[] = '</span></p>';
    $content[] = '</div>';
    $content[] = '<div class="margin-top"><a class="button purple icon-download" id=download_'.$index->id.'>{LNG_Download}</a> ({LNG_size of} {LNG_File} '.Text::formatFileSize($index->size).')</div>';
    $content[] = '</article>';
    $content[] = '<script>initEdocumentView("download_'.$index->id.'")</script>';
    return implode('', $content);
  }
}
