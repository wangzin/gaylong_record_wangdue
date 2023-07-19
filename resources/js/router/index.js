import { createRouter, createWebHashHistory} from "vue-router";
import Dashboard from '../components/Dashboard'
import CountryIndex from '../components/administration/masters/CountryMaster'
import RoleIndex from '../components/administration/masters/RoleMaster'
import DesigIndex from '../components/administration/masters/DesignationMaster'
import UserIndex from '../components/administration/usermanagement/UserManagement'
import FaqIndex from '../components/administration/services/FaqIndex'

const history = createWebHashHistory();
const router =  createRouter({
    history,
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: Dashboard
        },
        {
            path: '',
            name: 'dashboard.index',
            component: Dashboard
        },

        {
            path: '/master_country',
            name: 'master_country',
            component: CountryIndex
        },
        {
            path: '/master_role',
            name: 'master_role',
            component: RoleIndex
        },
        {
            path: '/master_designation',
            name: 'master_designation',
            component: DesigIndex
        },
        {
            path: '/user_management',
            name: 'user_management',
            component: UserIndex
        },
        {
            path: '/service_emer_cont_points',
            name: 'service_faq',
            component: FaqIndex
        },
        {
            path: '/service_emer_cont_points',
            name: 'service_emer_cont_points',
            component: FaqIndex
        },
    ],
});
export default router
