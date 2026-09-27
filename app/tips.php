<?php

// class CategorySupervisor
// {
//    public function readAll(): Collection
//    {
//        return Category::whereNull('parent_id')
//            ->with([
//                'children' => fn($query) => $query->orderBy('name'),
//            ])
//            ->orderBy('name')
//            ->get();
//    }
// }

// class CategoryController
// {
//    public function index(CategorySupervisor $supervisor): View
//    {
//        $categories = $supervisor->readAll();
//
//        return view('pages.store.categories.index', compact('categories'));
//    }
// }
//
//
//
// class ProductController
// {
//    private const ONE_HOUR_IN_SECONDS = 3600;
//
//    public function index(ProductFilter $filter, CategorySupervisor $categorySupervisor)
//    {
//
//        $products = Product::query()
//            ->with('primaryImage', 'category')
//            ->filter($filter)
//            ->paginate(6)
//            ->withQueryString();
//
//        $sidebarCategories = Cache::remember(
//            'categories',
//            self::ONE_HOUR_IN_SECONDS,
//            static fn() => $categorySupervisor->readAll(),
//        );
//
//        return view(
//            'pages.store.products.index',
//            compact('products', 'sidebarCategories')
//        );
//    }
// }

//
// class AppServiceProvider extends ServiceProvider
// {
//    private const ONE_HOUR_IN_SECONDS = 3600;
//
//    public function boot(): void
//    {
//        Model::preventLazyLoading(!$this->app->isProduction());
//        Model::preventSilentlyDiscardingAttributes($this->app->isLocal());
//
//        // TODO: add view composer as class
//        View::composer('components.navigation.navbar', function ($view) {
//            $categories = Cache::remember(
//                'categories',
//                self::ONE_HOUR_IN_SECONDS,
//                static fn() => app(CategorySupervisor::class)->readAll(),
//            );
//            $view->with('categories', $categories);
//        });
//
//        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
//            return (new MailMessage)
//                ->subject('Verify Your Email Address')
//                ->view('emails.custom-verify', [
//                    'user' => $notifiable,
//                    'url' => $url,
//                ]);
//        });
//
//        Gate::define('access-admin-dashboard', function (User $user) {
//            return $user->isAdmin();
//        });
//
//    }
// }
