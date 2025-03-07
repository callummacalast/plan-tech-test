const SkeletonCard = () => {
  return (
    <div className="flex flex-col m-8 rounded  animate-pulse">
      <div className="h-40 rounded-lg bg-gray-200"></div>
      <div className="flex gap-3 mt-5">
        <div className="rounded-full shadow bg-gray-200 flex-shrink-0 h-10 w-10"></div>
        <div className="w-full">
          <h3 className="h-6 w-full bg-gray-200 rounded-sm"></h3>
          <p className="h-6 w-1/2 bg-gray-200 rounded-sm mt-2"></p>
          <p className="h-6 w-1/2 bg-gray-200 rounded-sm mt-2"></p>
        </div>
      </div>
    </div>
  )
}

export default SkeletonCard
