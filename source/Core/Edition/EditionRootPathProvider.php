<?php
/**
 * This file is part of OXID eShop Community Edition.
 *
 * OXID eShop Community Edition is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * OXID eShop Community Edition is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with OXID eShop Community Edition.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2016
 * @version   OXID eShop CE
 */

namespace OxidEsales\Eshop\Core\Edition;

/**
 * Class is responsible for returning edition directory path.
 *
 * @internal Do not make a module extension for this class.
 * @see      http://wiki.oxidforge.org/Tutorials/Core_OXID_eShop_classes:_must_not_be_extended
 */
class EditionRootPathProvider
{
    const EDITIONS_DIRECTORY = 'Edition';

    const ENTERPRISE_DIRECTORY = 'Enterprise';

    const PROFESSIONAL_DIRECTORY = 'Professional';

    /** @var EditionSelector */
    private $editionSelector;

    /**
     * @param $editionSelector
     */
    public function __construct($editionSelector)
    {
        $this->editionSelector = $editionSelector;
    }

    /**
     * Forms path to edition directory.
     *
     * @return string
     */
    public function getDirectoryPath()
    {
        $path = rtrim(getShopBasePath(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        if ($this->getEditionSelector()->isEnterprise()) {
            $path .= static::EDITIONS_DIRECTORY . DIRECTORY_SEPARATOR . static::ENTERPRISE_DIRECTORY . DIRECTORY_SEPARATOR;
        }

        if ($this->getEditionSelector()->isProfessional()) {
            $path .= static::EDITIONS_DIRECTORY . DIRECTORY_SEPARATOR . static::PROFESSIONAL_DIRECTORY . DIRECTORY_SEPARATOR;
        }

        return $path;
    }

    /**
     * @return EditionSelector
     */
    protected function getEditionSelector()
    {
        return $this->editionSelector;
    }
}
