import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
    // Home
    {
        path: '',
        loadChildren: () => import('./components/pages/home/home.module').then(m => m.HomeModule),
        data: { breadcrumb: 'Homepage' },
    },
    // Sobre-Nos
    {
        path: 'sobre-nos',
        loadChildren: () => import('./components/pages/sobre-nos/sobre-nos.module').then(m => m.SobreNosModule),
        data: { breadcrumb: 'Sobre Nós' },
    },
    // Acerte
    {
        path: 'acerte',
        loadChildren: () => import('./components/pages/acerte/acerte.module').then(m => m.AcerteModule),
        data: { breadcrumb: 'Acerte' },
    },
    // Blog
    {
        path: 'blog/cat/:catId',
        loadChildren: () => import('./components/pages/blog-grid/blog-grid.module').then(m => m.BlogGridModule),
        data: { breadcrumb: 'Blog Grid' },
    },
    {
        path: 'blog/tag/:tagId',
        loadChildren: () => import('./components/pages/blog-grid/blog-grid.module').then(m => m.BlogGridModule),
        data: { breadcrumb: 'Blog Grid' },
    },
    {
        path: 'blog/author/:authorId',
        loadChildren: () => import('./components/pages/blog-grid/blog-grid.module').then(m => m.BlogGridModule),
        data: { breadcrumb: 'Blog Grid' },
    },
    {
        path: 'blog/search/:query',
        loadChildren: () => import('./components/pages/blog-grid/blog-grid.module').then(m => m.BlogGridModule),
        data: { breadcrumb: 'Blog Grid' },
    },
    {
        path: 'blog-grid',
        loadChildren: () => import('./components/pages/blog-grid/blog-grid.module').then(m => m.BlogGridModule),
        data: { breadcrumb: 'Blog Grid' },
    },
    {
        path: 'blog-details/:id',
        loadChildren: () => import('./components/pages/blog-details/blog-details.module').then(m => m.BlogDetailsModule),
        data: { breadcrumb: 'Blog Details' },
    },
    // Contact
    {
        path: 'contact',
        loadChildren: () => import('./components/pages/contact/contact.module').then(m => m.ContactModule),
        data: { breadcrumb: 'Contact Us' },
    },
    // Error page
    {
        path: 'error-page',
        loadChildren: () => import('./components/pages/error-page/error-page.module').then(m => m.ErrorPageModule),
        data: { breadcrumb: 'Error 404' },
    },
    {
        path: '**',
        loadChildren: () => import('./components/pages/error-page/error page.module').then(m => m.ErrorPageModule),
        data: { breadcrumb: 'Error 404' },
    },{
        path: 'doar',
        loadChildren: () => import('./components/pages/doar/home.module').then(m => m.DoarModule),
        data: { breadcrumb: 'Doar' },
    },
];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule],
})
export class AppRoutingModule {
}
