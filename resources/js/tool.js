Nova.booting((Vue, router, store) => {
    router.addRoutes([
        {
            name: 'forge-server',
            path: '/forge-server',
            component: require('./components/Tool'),
        },
    ])
})
