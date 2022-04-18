<?php
namespace MailPoetVendor\Twig\Node\Expression\Binary;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Compiler;
class BitwiseOrBinary extends AbstractBinary
{
 public function operator(Compiler $compiler)
 {
 return $compiler->raw('|');
 }
}
\class_alias('MailPoetVendor\\Twig\\Node\\Expression\\Binary\\BitwiseOrBinary', 'MailPoetVendor\\Twig_Node_Expression_Binary_BitwiseOr');
