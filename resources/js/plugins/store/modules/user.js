/*
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

export default {
    namespaced: true,

    state: () => ({
        id: null,

        username: null,

        firstName: null,
        lastName: null
    }),

    getters: {
        hasLogged: () => !! localStorage?.token,

        username: state => state.username?.trim(),

        fullName: state => (state.firstName + ' ' + state.lastName)?.trim()
    }
};
